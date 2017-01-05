<?php
namespace App\Http\Controllers;
use App\Models\Mongohaha as Mongohaha;
use App\Http\Request\CreateArticleRequest as CreateArticleRequest;

class mongoController extends Controller {
    public function aaaaUsers() {
        $list = new Mongohaha();
        return $list->where("alias","loan_types")->get();
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
        return view;
    }
}
