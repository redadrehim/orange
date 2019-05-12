<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\Category;
use App\Models\Item;
use Layer\Base\Common\BaseRepository;
use Goutte;
use Feeds;

/**
 * Class ItemRepository
 * @package App\Repositories
 * @version March 22, 2019, 7:17 pm UTC
 *
 * @method Item findWithoutFail($id, $columns = ['*'])
 * @method Item find($id, $columns = ['*'])
 * @method Item first($columns = ['*'])
 */
class ItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'thumbnail',
        'poster',
        'brief',
        'description',
        'category_id',
        'source',
        'url',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Item::class;
    }

    public function search($input)
    {

        if (isset($input['service'])) {

            $items = $this->searchByServiceID($input['service']);

        } else if (isset($input['category'])) {

            $items = $this->searchByCategoryID($input['category']);

        } else if (isset($input['servicelike'])) {

            $items = $this->searchByServiceName($input['servicelike']);

        } else if (isset($input['categorylike'])) {

            $items = $this->searchByCategoryName($input['categorylike']);

        } else if (isset($input['keyword'])) {
            if (isset($input['elastic'])) {
                $items = $this->searchByKeywordElastic($input['keyword']);
            } else {
                $items = $this->searchByKeywordDB($input['keyword']);
            }


        } else {

            $items = Item::get();
        }

        return $items;
    }

    public function searchByServiceID($serviceID)
    {

        $categories = Category::where('service_id', $serviceID)->pluck('id')->toArray();
        $items = Item::wherein('category_id', $categories)->get();
        return $items;
    }

    public function searchByCategoryID($categoryID)
    {

        $items = Item::where('category_id', $categoryID)->get();
        return $items;
    }

    public function searchByServiceName($serviceName)
    {

        $services = Service::where('name', 'like', '%' . $serviceName . '%')->pluck('id')->toArray();
        $categories = Category::wherein('service_id', $services)->pluck('id')->toArray();
        $items = Item::wherein('category_id', $categories)->get();
        return $items;
    }

    public function searchByCategoryName($categoryName)
    {

        $categories = Category::where('name', 'like', '%' . $categoryName . '%')->pluck('id')->toArray();
        $items = Item::wherein('category_id', $categories)->get();
        return $items;
    }

    public function searchByKeywordElastic($keyword)
    {


        $items = Item::search($keyword)
            ->rule(function ($builder) {
                return [

                    'should' => [
                        [
                            'match' => [
                                'title' => [
                                    'query' => $builder->query,
                                    'boost' => 3
                                ]
                            ]
                        ],
                        [
                            'match' => [
                                'category_name' => [
                                    'query' => $builder->query,
                                    'boost' => 2
                                ]
                            ]
                        ],
                        [
                            'match' => [
                                'service_name' => [
                                    'query' => $builder->query,
                                    'boost' => 1
                                ]
                            ]
                        ]
                    ]

                ];
            })
            ->get();

        return $items;
    }

    public function searchByKeywordDB($keyword)
    {
        $items_services = $this->searchByServiceName($keyword);
        $items_categories = $this->searchByCategoryName($keyword);
        $items_titles = Item::where('title', 'like', '%' . $keyword . '%')->get();
        $items = $items_services->merge($items_categories)->merge($items_titles);
        //$items=array_merge($items_services,$items_categories,$items_titles);
        return $items;
    }

    public function crawling($category_id, $url)
    {
        $crawler = Goutte::request('GET', $url);

        $crawler->filter('.blog-post-item h2 a')->each(function ($node) use ($category_id, $url) {

            $subcrawler = Goutte::request('GET', $node->attr('href'));
            $input['title'] = $subcrawler->filter('.blog-post-title')->text();
            $input['brief'] = $subcrawler->filter('.post-desc')->text();
            $input['description'] = $subcrawler->filter('.post-desc')->text();
            $input['thumbnail'] = $url . $subcrawler->filter('.img-responsive')->attr('src');
            $input['poster'] = $url . $subcrawler->filter('.img-responsive')->attr('src');
            $input['category_id'] = $category_id;
            $input['source'] = 'Crawling';
            $input['url'] = $node->attr('href');
            $input['status'] = 1;
            $item = Item::where('title', '=', $input['title'])->first();
            if (!isset($item->id)) {
                $this->create($input);
            }
        });
        return true;
    }

    public function rssFeedReader($category_id, $url)
    {
        $feed = Feeds::make($url, true);

        foreach ($feed->get_items() as $key => $item) {
            $input['title'] = $item->get_title();
            $input['brief'] = $item->get_description();
            $input['description'] = $item->get_description();
            $input['thumbnail'] = '';
            $input['poster'] = '';
            $input['category_id'] = $category_id;
            $input['source'] = 'RSS';
            $input['url'] = $item->get_permalink();
            $input['status'] = 1;
            $item = Item::where('title', '=', $input['title'])->first();
            if (!isset($item->id)) {
                $this->create($input);
            }
        }
        return true;
    }

    public function googleApisReader($category_id, $search_key)
    {
        $news = file_get_contents("https://newsapi.org/v2/everything?q=".$search_key."&amp;from=2019-05-06&sortBy=publishedAt&apiKey=4d838effdc5140838f24c6e46b99796b");
        $news = json_decode($news, true);
        foreach ($news['articles'] as $key => $item) {
            $input['title'] = $item['title'];
            $input['brief'] = $item['description'];
            $input['description'] = $item['content'];
            $input['thumbnail'] = $item['urlToImage'];
            $input['poster'] = $item['urlToImage'];
            $input['category_id'] = $category_id;
            $input['source'] = 'RSS';
            $input['url'] = $item['url'];
            $input['status'] = 1;
            $item = Item::where('title', '=', $input['title'])->first();
            if (!isset($item->id)) {
                $this->create($input);
            }
        }
        return true;

    }

}
