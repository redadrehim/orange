<?php

namespace App\Repositories;

use App\Models\Category;
use Layer\Base\Common\BaseRepository;

/**
 * Class CategoryRepository
 * @package App\Repositories
 * @version March 22, 2019, 5:57 pm UTC
 *
 * @method Category findWithoutFail($id, $columns = ['*'])
 * @method Category find($id, $columns = ['*'])
 * @method Category first($columns = ['*'])
*/
class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'service_id',
        'source',
        'url',
        'search_key',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Category::class;
    }
}
