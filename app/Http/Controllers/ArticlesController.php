<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index(Request $request) {
        $hot_articles = Article::query()->where('on_show', true)->orderBy('read_count', 'desc')->paginate(6);

        $new_articles = Article::query()->where('on_show', true)->orderBy('created_at', 'desc')->paginate(6);

        $comment_articles = Article::query()->where('on_show', true)->orderBy('comment_count', 'desc')->paginate(6);

        $rand_articles = Article::inRandomOrder()->take(6)->get();

        $category1 = Article::query()->where('on_show', true)->where('category', '美女联盟')->paginate(6);

        $category2 = Article::query()->where('on_show', true)->where('category', '美少女联盟')->paginate(6);

        return view('index', [
            'hot_articles'      => $hot_articles,
            'new_articles'      => $new_articles,
            'comment_articles'  => $comment_articles,
            'rand_articles'     => $rand_articles,
            'category1'         => $category1,
            'category2'         => $category2
        ]);
    }
}
