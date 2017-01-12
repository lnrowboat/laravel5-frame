<?php
namespace App\Models\Mysql;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
//use Laravel\Scout\Searchable;

class Item extends Model
{

    //use Searchable;
    use AlgoliaEloquentTrait;
    protected $table = 'items';
    protected $primaryKey = 'id';
    public static $autoIndex = true;
    //public $fillable = ['title'];

    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function searchableAs()
    {
        return 'items_index';
    }
    
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}