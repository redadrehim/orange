<?php

use Faker\Factory as Faker;
use App\Models\Item;
use App\Repositories\ItemRepository;

trait MakeItemTrait
{
    /**
     * Create fake instance of Item and save it in database
     *
     * @param array $itemFields
     * @return Item
     */
    public function makeItem($itemFields = [])
    {
        /** @var ItemRepository $itemRepo */
        $itemRepo = App::make(ItemRepository::class);
        $theme = $this->fakeItemData($itemFields);
        return $itemRepo->create($theme);
    }

    /**
     * Get fake instance of Item
     *
     * @param array $itemFields
     * @return Item
     */
    public function fakeItem($itemFields = [])
    {
        return new Item($this->fakeItemData($itemFields));
    }

    /**
     * Get fake data of Item
     *
     * @param array $postFields
     * @return array
     */
    public function fakeItemData($itemFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id' => $fake->word,
            'name' => $fake->word,
            'thumbnail' => $fake->word,
            'brief' => $fake->word,
            'description' => $fake->word,
            'quantity' => $fake->randomDigitNotNull,
            'in_stock' => $fake->randomDigitNotNull,
            'price' => $fake->randomDigitNotNull,
            'off_price' => $fake->randomDigitNotNull,
            'views' => $fake->randomDigitNotNull,
            'purchased' => $fake->randomDigitNotNull,
            'brand_id' => $fake->randomDigitNotNull,
            'language_id' => $fake->randomDigitNotNull,
            'translation_id' => $fake->randomDigitNotNull,
            'scope_id' => $fake->randomDigitNotNull,
            'status' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $itemFields);
    }
}
