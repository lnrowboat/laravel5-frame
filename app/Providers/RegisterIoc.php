<?php
namespace App\Providers;
use App;

class RegisterIoc {
	
	public function __construct()
    {
		//$arr = $this->mapEventListener();
		//$this->listen = $arr;
    }
	
	public function registerModelMongo ($type) {
        $path = app_path() . "/Models/Mongo";
		$results = scandir($path);
		foreach ($results as $result) {
			if ($result === '.' or $result === '..') continue;
			$filename = $path . '/' . $result;
			if (!is_dir($filename)) {
				$result = substr($result,0,-4);
				$className = 'App\Models\Mongo\\'.$result;
				$className = new $className;
				App::instance($type.$result, $className);
			}
		}
    }
	
	public function registerModelMysql ($type) {
        $path = app_path() . "/Models/Mysql";
		$results = scandir($path);
		foreach ($results as $result) {
			if ($result === '.' or $result === '..') continue;
			$filename = $path . '/' . $result;
			if (!is_dir($filename)) {
				$result = substr($result,0,-4);
				$className = 'App\Models\Mysql\\'.$result;
				$className = new $className;
				App::instance($type.$result, $className);
			}
		}
    }
	
	/* Map one to one*/
	public function mapEventListener () {
        $path = app_path() . "/Events";
		$results = scandir($path);
		$arr = [];
		foreach ($results as $result) {
			if ($result === '.' or $result === '..') continue;
			$filename = $path . '/' . $result;
			if (!is_dir($filename)) {
				$result = substr($result,0,-9); // "Event.php"
				$className = 'App\Events\\'.$result.'Event';
				$arr['App\Events\\'.$result.'Event'] = ['App\Listeners\\'.$result.'Listener'];
			}
		}
		return $arr;
    }
	
	public function doNothing () {
		return 'do nothing';
	}
	
}