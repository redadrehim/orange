<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 * @package App\Models
 * @version May 1, 2019, 12:32 pm UTC
 *
 * @property string name
 * @property string description
 * @property integer status
 */
class Service extends Model
{
    use SoftDeletes;

    public $table = 'services';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function items()
    {
        return $this->hasManyThrough('App\Models\Item', 'App\Models\Category');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }
    
}
