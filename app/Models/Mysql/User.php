<?php
namespace App\Models\Mysql;
use Illuminate\Database\Eloquent\Model;
use Validator;

class User extends Model
{
	protected $table = 'users';
    public $rules = array(
        'email' => 'required');
    public $attributes;
    public function __construct($data=[]) {
        $this->attributes = $data;
    }
 
    public function getAll(){
        $lists = $this->all();	
    }
}
