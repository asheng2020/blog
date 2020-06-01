<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Comment;
use App\User;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'article_id',
        'user_id',
        'comment_id',
        'location',
        'browser',
        'ip',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function children($id)
    {
        $children = Comment::query()->where('comment_id', $id)->orderBy('created_at', 'asc')->get();

        return $children;
    }

    public function parent($id) {
        $parent = Comment::find($id);

        return $parent;
    }
}
