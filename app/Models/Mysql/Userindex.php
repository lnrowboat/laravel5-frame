<?php
namespace App\Models\Mysql;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
class UserIndex extends Model
{
    use Searchable;
    protected $table = 'users';
    
    public function searchableAs()
    {
        return 'id';
    }
    
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
    
/*    public function searchableAs()
    {
        return 'abc';
       //$array = $this->toArray();

        // Customize array...

        //return $array;
    }
  */  
}
