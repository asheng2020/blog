<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\Article;

class AuthController extends Controller
{
    //获取微博登录页面
     public function weibo() {
        $path = public_path().'/images/'.date("Ymd", time());

        var_dump($path);
        // return \Socialite::with('weibo')->redirect();
        // return \Socialite::with('weibo')->scopes(array('email'))->redirect();
    }
    //获取登录用户信息
    public function callback() {
        // $oauthUser = \Socialite::with('weibo')->user();
        // var_dump($oauthUser->getId());
        // var_dump($oauthUser->getNickname());
        // var_dump($oauthUser->getName());
        // var_dump($oauthUser->getEmail());
        // var_dump($oauthUser->getAvatar());
        $user = new Category([
            'name'  => 'dage',
        ]);
        Auth::login($user);
        // var_dump(Auth::check());
        // var_dump(Auth::id());
    }

    public function images(Request $request) {
        if (Article::query()->where('title', $request->title)->first()) {
            return 'exist';
        }

        $images = json_decode($request->images, true);

        $path = public_path().'/images/'.date("Ymd", time());

        var_dump($path);
        if (!is_dir($path)) {
            mkdir($path);
        }

        $content = '';
        foreach ($images as $key => $image) {
            $img = Image::make($image);

            $arr = explode('/', $image);

            $file_name = $arr[count($arr) - 1];

            // var_dump(url('images/'.$file_name));

            // if($a = User::find(1111)) {
            //     var_dump($a);
            // }


            if(!file_exists($path.'/'.$file_name)) {

                // 插入水印, 水印位置在原图片的右下角, 距离下边距 1 像素, 距离右边距 10 像素
                $img->insert('watermark.png', 'bottom-right', 10, 1);

                // 将处理后的图片重新保存到其他路径
                $img->save($path.'/'.$file_name);

                // 上面的逻辑可以通过链式表达式搞定
                // $img = Image::make('images/avatar.jpg')->resize(200, 200)->insert('images/new_avatar.jpg', 'bottom-right', 15, 10);
            }

            $content .= '<p class="ql-align-center"><img src="'.url('/images/'.date("Ymd", time()).'/'.$file_name).'"></p><br>';
        }

        $arr = explode('/', $images[0]);
        $file_name = $arr[count($arr) - 1];

        Article::create([
            'title'         => $request->title,
            'cover'         => 'images/'.date("Ymd", time()).'/'.$file_name,
            'description'   => $request->title,
            'content'       => $content,
            'category_id'   => $request->category_id,
        ]);

        return 'success';

    }
}
