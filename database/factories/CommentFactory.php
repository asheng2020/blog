<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content'       => $faker->sentence(),
        'user_id'       => random_int(1, 100),
        'comment_id'    => 0,
        'location'      => 'Connecticut-New Haven',
        'browser'       => 'Chrome-81.0.4044.138',
        'ip'            => '192.168.10.1'
    ];
});
