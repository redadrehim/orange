<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version March 22, 2019, 5:57 pm UTC
 *
 * @property string name
 * @property string description
 * @property integer service_id
 * @property string source
 * @property string url
 * @property string search_key
 * @property integer status
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'service_id',
        'source',
        'url',
        'search_key',
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
        'service_id' => 'integer',
        'source' => 'string',
        'url' => 'string',
        'search_key' => 'search_key',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function items(){
        return $this->hasMany('App\Models\Item');
    }

    public function service(){
        return $this->belongsTo('App\Models\Service');
    }
    
}
