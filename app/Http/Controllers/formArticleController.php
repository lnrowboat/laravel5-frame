<?php
namespace App\Http\Controllers;
use App\Models\Mongohaha as Mongohaha;
use App\Http\Request\CreateArticleRequest as CreateArticleRequest;

class formArticleController extends Controller {
    public function store(CreateArticleRequest $request)
    {
        Article::create($request->all());
        return view('article.formarticle');
    }
    public function update($id, Request)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
}
