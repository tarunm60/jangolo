<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::get();
        return response()->json([
            'message'=>'This is a test',
            'count'=>count($articles),
            'articles' => $articles
        ],200);
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
