<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;

class ArticlesController extends Controller
{
    public function home() {

        $articles = Article::query()->orderByDesc('read_count')->get()->take(3);

        return view('index', ['articles' => $articles]);
    }

    public function index(Request $request) {

        $builder = Article::query()->where('on_show', true);

        // $articles = Article::query()->orderByDesc('is_top')->orderByDesc('created_at');
        if ($category = $request->category_id) {
            $builder->where('category_id', $category);
        }

        $articles = $builder->orderByDesc('is_top')->orderByDesc('created_at')->paginate(16);

        if ($request->ajax()) {
            if ($articles->count() <= 0) {
                return response()->json(['html'=> '']);
            }
            $view = view('pages.data', ['articles' => $articles])->render();
            return response()->json(['html'=>$view]);
        }

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

    public function show(Article $article, Request $request) {

        $article->increment('read_count');

        $messages = Comment::query()->where('article_id', $article->id)->where('comment_id', 0)->orderByDesc('created_at')->paginate(10);

        if ($request->ajax()) {
            if ($messages->count() <= 0) {
                return response()->json(['html'=> '']);
            }
            $view = view('messages.list', ['messages' => $messages])->render();
            return response()->json(['html'=>$view]);
        }

        $recommends = Article::query()  ->inRandomOrder()->take(3)->get();

        return view('pages.content', [
            'article'       => $article,
            'recommends'    => $recommends,
            'messages'      => $messages,
        ]);
    }

    public function search(Request $request) {
        if (empty($request->content)) {
            return response()->json(['html' => '']);
        }
        $builder = Article::query()->where('on_show', true);
        if ($search = $request->input('content', '')) {
            $like = '%'.$search.'%';
            $builder->where(function ($query) use ($like) {
                $query->where('title', 'like', $like);
            });
        }
        $articles = $builder->get();
        $view = view('pages.search', ['articles' => $articles, 'search' => $search])->render();
        return response()->json(['html' => $view]);
    }
}
