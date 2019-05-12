<?php

namespace App\Repositories;

use App\Models\Service;
use Layer\Base\Common\BaseRepository;

/**
 * Class ServiceRepository
 * @package App\Repositories
 * @version May 1, 2019, 12:32 pm UTC
 *
 * @method Service findWithoutFail($id, $columns = ['*'])
 * @method Service find($id, $columns = ['*'])
 * @method Service first($columns = ['*'])
*/
class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Service::class;
    }
}
