<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Category extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = [
        'name'
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }
}
