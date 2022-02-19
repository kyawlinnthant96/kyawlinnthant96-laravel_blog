<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'detail']);
    }

    public function index() 
    {   
        $data = Article::latest()->paginate(5);
        return view('articles.index',[
            'articles' => $data
        ]);
    }

    public function detail($id)
    {
        $data = Article::find($id);

        return view('articles.detail',[
            'article' => $data
        ]);
    }

    // Article Edit
    public function edit($id)
    {
        $data = Article::find($id);
        $option = Category::all();

        return view('articles.edit', [
            'article' => $data,
            'categories' => $option
        ]);
    }
    public function update()
    {
        $article = new Article();
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();
        return redirect('/articles');
    }

    public function add()
    {
        $data = Category::all();
        return view('articles.add', [
            'categories' => $data
        ]);
    }

    public function create()
    {
        // check valid
        $validator = validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        // fail back with error
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('/articles');

    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('info', 'Article deleted');
    }
}
