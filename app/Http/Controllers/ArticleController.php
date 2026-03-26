<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()->paginate(12);
        return view('articles.index', compact('articles'));
    }

    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $related = Article::published()
            ->where('id', '!=', $article->id)
            ->limit(3)
            ->get();
        return view('articles.show', compact('article', 'related'));
    }

    public function category(string $category)
    {
        $articles = Article::published()
            ->where('category', $category)
            ->paginate(12);
        return view('articles.index', compact('articles', 'category'));
    }
}
