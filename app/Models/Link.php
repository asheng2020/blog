<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Link extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = [
        'name',
        'cover',
        'url',
        'description'
    ];
}
