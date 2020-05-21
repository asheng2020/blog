<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'cover',
        'description',
        'content',
        'category',
        'read_count',
        'comment_ount',
        'on_show'
    ];

    protected $casts = [
        'on_show' => 'boolean',
    ];
}
