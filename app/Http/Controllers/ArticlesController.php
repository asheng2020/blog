<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticlesController extends Controller
{
    public function home() {

        $articles = Article::query()->orderByDesc('read_count')->get()->take(3);

        return view('index', ['articles' => $articles]);
    }

    public function index() {

        $articles = Article::query()->orderByDesc('is_top')->orderByDesc('created_at')->paginate(10);

        $top_articles = $articles->where('is_top')->pluck('title', 'id');

        $hot_articles = Article::query()->orderByDesc('read_count')->paginate(10);

        $categories = Category::get();

        return view('pages.articles', [
            'articles'      => $articles,
            'top_articles'  => $top_articles,
            'hot_articles'  => $hot_articles,
            'categories'    => $categories,
        ]);
    }

    public function show(Article $article) {

        $recommends = Article::query()->inRandomOrder()->take(3)->get();

        return view('pages.content', [
            'article'   => $article,
            'recommends' => $recommends,
        ]);
    }
}
