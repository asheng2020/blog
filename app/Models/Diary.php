<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Diary extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = [
        'content'
    ];
}
