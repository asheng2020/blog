<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {

    $cover = $faker->randomElement([
        "http://tvax1.sinaimg.cn/large/9afb97dagy1g43fjsjesej20u017t4qp.jpg",
        "http://tvax4.sinaimg.cn/large/9c774d91gy1g48yxpxxdfj20u01d7nph.jpg",
        "http://tvax1.sinaimg.cn/large/9afb97dagy1g43f8loy4pj20u017v4qp.jpg",
        "http://tvax1.sinaimg.cn/large/9afb97dagy1g43fapj6phj20mf0xc4b6.jpg",
        "https://tvax1.sinaimg.cn/large/9c774d91gy1g7jk8gsqh8j20ij0rsgtb.jpg",
        "https://tvax2.sinaimg.cn/large/9c774d91gy1g7jk8fe0gij20ij0rs79r.jpg",
        "https://tvax3.sinaimg.cn/large/9c774d91gy1g7jk8wlj1jj20ij0rsn47.jpg",
        "http://tvax1.sinaimg.cn/large/9c774d91gy1g66dxmra2sj20li0sotfi.jpg",
        "https://www.yuoimg.com/u/20190815/1847244.jpg",
        "https://www.yuoimg.com/u/20190813/17322342.jpg",
        "http://tvax1.sinaimg.cn/large/9c774d91gy1g4ranumxe0j20u017v1l0.jpg",
        "http://tvax1.sinaimg.cn/large/9c774d91gy1g4rap6g3o3j20u01907wl.jpg",
        "http://tvax1.sinaimg.cn/large/9c774d91gy1g4awuk0b55j21ev0u0n4w.jpg",
        "http://tvax2.sinaimg.cn/large/9c774d91gy1g48wp0nn5zj20p00xc7si.jpg",
        "http://tvax3.sinaimg.cn/large/9c774d91gy1g48x3c2i4dg20j60pk4qw.gif",
        "http://tvax1.sinaimg.cn/large/9afb97dagy1g44ytlj04nj20u017zu0x.jpg",
        "http://tvax1.sinaimg.cn/large/9afb97dagy1g44zw89lazj20u016gu0y.jpg",
        "http://tvax1.sinaimg.cn/large/9afb97dagy1g43g0x83ixj20l80u0ajq.jpg",
        "http://tva1.sinaimg.cn/large/9afb97dagy1g3w56p5rcdj20l80u0gpm.jpg",
        "http://tva1.sinaimg.cn/large/9afb97dagy1g3w59zcjwyj20l80u0k2p.jpg",
        "http://tva1.sinaimg.cn/large/9afb97dagy1fybx7r5pxjj20u017ub2b.jpg",
        "http://tva1.sinaimg.cn/large/9c774d91gy1g3xwzcsaa3j20u017v7wh.jpg",
        "http://tva1.sinaimg.cn/large/9afb97dagy1fyc2jrrbjqj20u016maq2.jpg",
        "http://tva1.sinaimg.cn/large/9afb97dagy1g3xw62nq4jj20u01841iq.jpg",
    ]);

    $is_top = random_int(0, 10) < 1;

    return [
        'title'         => $faker->sentence(5),
        'cover'         => $cover,
        'description'   => $faker->sentence(10),
        'content'       => $faker->paragraph,
        'read_count'    => $faker->randomNumber(4),
        'comment_count' => $faker->randomNumber(2),
        'on_show'       => 1,
        'is_top'        => $is_top,
    ];
});
