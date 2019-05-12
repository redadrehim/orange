<?php

namespace App\Models;

use App\ItemIndexConfigurator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ScoutElastic\Searchable;
use App;

/**
 * Class Item
 * @package App\Models
 * @version March 22, 2019, 7:17 pm UTC
 *
 * @property string title
 * @property string thumbnail
 * @property string poster
 * @property string brief
 * @property string description
 * @property integer category_id
 * @property string source
 * @property string url
 * @property integer status
 */
class Item extends Model
{
    use SoftDeletes,Searchable;

    public $table = 'items';
        protected $indexConfigurator = ItemIndexConfigurator::class;


    protected $dates = ['deleted_at'];

    protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text',
                'analyzer' => 'english'
            ],
        ]
    ];

    public function toSearchableArray()
    {
        $array = $this->toArray();



        $array['category_name'] = $this->category->name;
        $array['service_name'] = $this->category->service->name;



        return $array;
    }

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'thumbnail' => 'string',
        'poster' => 'string',
        'brief' => 'string',
        'description' => 'string',
        'category_id' => 'integer',
        'source' => 'string',
        'url' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    
}
