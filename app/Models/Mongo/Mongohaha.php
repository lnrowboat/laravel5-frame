<?php
namespace App\Models\Mongo;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Mongohaha extends Eloquent {
    protected $connection = 'mongodb';
    protected $collection = 'data_option';
    public function __construct () {
        
    }
    public function getAll(){
        return $this->all();	
    }
}