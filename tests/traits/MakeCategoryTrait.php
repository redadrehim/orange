<?php

use Faker\Factory as Faker;
use App\Models\Category;
use App\Repositories\CategoryRepository;

trait MakeCategoryTrait
{
    /**
     * Create fake instance of Category and save it in database
     *
     * @param array $categoryFields
     * @return Category
     */
    public function makeCategory($categoryFields = [])
    {
        /** @var CategoryRepository $categoryRepo */
        $categoryRepo = App::make(CategoryRepository::class);
        $theme = $this->fakeCategoryData($categoryFields);
        return $categoryRepo->create($theme);
    }

    /**
     * Get fake instance of Category
     *
     * @param array $categoryFields
     * @return Category
     */
    public function fakeCategory($categoryFields = [])
    {
        return new Category($this->fakeCategoryData($categoryFields));
    }

    /**
     * Get fake data of Category
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCategoryData($categoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'thumbnail' => $fake->word,
            'brief' => $fake->word,
            'description' => $fake->word,
            'category_id' => $fake->randomDigitNotNull,
            'is_offer' => $fake->randomDigitNotNull,
            'status' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $categoryFields);
    }
}
