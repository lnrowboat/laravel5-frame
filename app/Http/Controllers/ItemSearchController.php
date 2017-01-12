<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Mysql\Item;
use App;
use Faker;
//use Faker\Generator as Faker;


class ItemSearchController extends Controller
{

	/**
     * Get the index name for the model.
     *
     * @return string
    */
    public function index($action = 'search') {
        return call_user_func_array(array($this, $action), array());
    }

    
    public function indexa(Request $request)
    {
        return Item::search('aaas');
    	/*if($request->has('titlesearch')){
                //var_dump($request->titlesearch); exit;
    		$items = Item::search($request->titlesearch)
    			->paginate(6);
    	}else{
    		$items = Item::paginate(6);
    	}
    	return view('search',compact('items'));*/
    }

    /**
     * Get the index name for the model.
     *
     * @return string
    */
    
    
    public function create()
    {
        $faker = Faker\Factory::create();
        $item = App::make('modelItem');
        $item->title = $faker->name;
        $item->created_at = $faker->dateTime();
        $item->updated_at = $faker->dateTime();
        $item->save();
    	//$this->validate($request,['title'=>'required']);

    	//$items = Item::create($request->all());
    	//return back();
    }
    
    
    public function search()
    {
        $item = App::make('modelItem');
        return $item->search('Heather Cremin');
    }
    
    
}