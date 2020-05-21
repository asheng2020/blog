<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['cover'], ['http://', 'https://'])) {
            return $this->attributes['cover'];
        }
        return \Storage::disk('public')->url($this->attributes['cover']);
    }
}
