<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Repositories\ItemRepository;
use App\Repositories\CategoryRepository;
use Auth;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Category;
use App\Models\Item;

class ItemController extends AppBaseController
{
    /** @var  ItemRepository */
    private $itemRepository;
    private $categoryRepo;


    public function __construct(ItemRepository $itemRepo,CategoryRepository $categoryRepo)
    {
        $this->itemRepository = $itemRepo;
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Item.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->itemRepository->pushCriteria(new RequestCriteria($request));
        $input = $request->all();

        if(isset($input['status'])){
            $items = Item::where('status',$input['status'] )->paginate(20);

            if($input['status']){$statusParam='Enabled';}else{$statusParam='Disabled';}
            $searchParam="";
        }elseif(isset($input['search'])){
            $items = Item::where('name', 'like' , '%'.$input['search'].'%' )->orWhere('code', 'like' , '%'.$input['search'].'%' )->paginate(20);

            $statusParam='ALL';
            $searchParam=$input['search'];

        }else{
            $items = Item::paginate(20);
            
            $statusParam='ALL';
            $searchParam="";
        }
        return view('items.index',compact('statusParam','searchParam'))
            ->with('items', $items);
    }

    public function ajax(Request $request){
        $input = $request->all();
        $item=Item::whereCode($input['itemcode'])->first();
         return $this->sendResponse($item->toArray(), 'Item retrieved successfully');
        //dd($item);
    }

    
    /**
     * Show the form for creating a new Item.
     *
     * @return Response
     */
    public function create()
    {

        $categories = Category::pluck('name', 'id');

        $categories->prepend('Categories', null);

        return view('items.create',compact('categories'));
    }

    /**
     * Store a newly created Item in storage.
     *
     * @param CreateItemRequest $request
     *
     * @return Response
     */
    public function store(CreateItemRequest $request)
    {
        $input = $request->all();
       // dd($input);
        if(isset($input['thumbnail']) && !empty($input['thumbnail']))$input['thumbnail'] = $this->fileUpload($request,'items','thumbnail');

        if(isset($input['poster']) && !empty($input['poster']))$input['poster'] = $this->fileUpload($request,'items','poster');

        if($input['status']='on'){$input['status']=1;}else{$input['status']=0;}

        $item = $this->itemRepository->create($input);

        Flash::success('Item saved successfully.');

        return redirect(route('items.index'));
    }
    /**
     * Display the specified Item.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.show')->with('item', $item);
    }
    /**
     * Show the form for editing the specified Item.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $item = $this->itemRepository->findWithoutFail($id);
        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $categories = Category::pluck('name', 'id');

        $categories->prepend('Category', null);

        return view('items.edit',compact('categories'))->with('item', $item);
    }
    /**
     * Update the specified Item in storage.
     *
     * @param  int              $id
     * @param UpdateItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemRequest $request)
    {
        $item = $this->itemRepository->findWithoutFail($id);
        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }
        $input = $request->all();

        if(isset($input['thumbnail']) && !empty($input['thumbnail']))$input['thumbnail'] = $this->fileUpload($request,'items','thumbnail');

        if(isset($input['poster']) && !empty($input['poster']))$input['poster'] = $this->fileUpload($request,'items','poster');

        if($input['status']='on'){$input['status']=1;}else{$input['status']=0;}

        $item = $this->itemRepository->update($input, $id);

        Flash::success('Item updated successfully.');

        return redirect(route('items.index'));
    }
    /**
     * Remove the specified Item from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function delete($id)
    {
        $item = $this->itemRepository->findWithoutFail($id);

        if (empty($item)) {

            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $this->itemRepository->delete($id);

        Flash::success('Item deleted successfully.');

        return redirect(route('items.index'));
    }

    public function fileUpload(Request $request,$folder,$type) {
        $this->validate($request, [$type => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        if ($request->hasFile($type)) {
            $image = $request->file($type);
            $name = 'upload/images/'.$folder.'/'.$type.'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/images/'.$folder.'/');
            $image->move($destinationPath, $name);
            return $name;
        }else{
            return '';
        }
    }

    public function import($id){
            $category = $this->categoryRepository->findWithoutFail($id);
            if (empty($category)) {
                Flash::error('Category not found');
                return redirect(route('categories.index'));
            }
            switch ($category->source) {
                        case 'Crawling':
                            $this->itemRepository->crawling($category->id,$category->url);
                            break;
                        case 'RSS':
                            $this->itemRepository->rssFeedReader($category->id,$category->url);
                            break; 
                        case 'API':
                            $this->itemRepository->googleApisReader($category->id,$category->search_key);
                            break;        
                    }
            Flash::success('Items saved successfully.');
            return redirect(route('categories.index'));
    }
}
