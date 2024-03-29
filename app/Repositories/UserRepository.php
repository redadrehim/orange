<?php

namespace App\Repositories;

use App\Models\User;
use Layer\Base\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version March 30, 2019, 12:15 pm UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'mobile',
        'verified',
        'password',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
