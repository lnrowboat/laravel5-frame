<?php
namespace App\Http\Controllers;
use App\Http\Request\CreateArticleRequest as CreateArticleRequest;
use App\Models\Mongohaha as Mongohaha;

class mongoController extends Controller {
	public function test()
    {
        return 'test 123';
    }
    public function getMongoUsers() {
        $list = new Mongohaha();
        return $list->all();
    }
    public function getMysqlUsers() {
        $list = new User();
        return $list->all();
    }
    public function getAbc()
    {
        //
    }
    public function postAbc()
    {
        //
    }
    
    public function store(CreateArticleRequest $request)
    {
        Article::create($request->all());
    }
     public function getAll()
    {
        return 'abc 123';
        //$item = App::make('usermodel');
        //return $item->all();
    }
}
