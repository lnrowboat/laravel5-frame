<?php
namespace App\Models\Mongo;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Tasks extends Eloquent {
    protected $connection = 'mongodb';
    protected $collection = 'tasks';
    public function __construct () {}
}
