<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Article extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = [
        'title',
        'cover',
        'description',
        'content',
        'category_id',
        'read_count',
        'comment_ount',
        'on_show',
        'is_top'
    ];

    protected $casts = [
        'on_show'   => 'boolean',
        'is_top'    => 'boolean'
    ];

    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['cover'], ['http://', 'https://'])) {
            return $this->attributes['cover'];
        }
        return \Storage::disk('public')->url($this->attributes['cover']);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
