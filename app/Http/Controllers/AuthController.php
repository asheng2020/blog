<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //获取微博登录页面
     public function weibo() {
        return \Socialite::with('weibo')->redirect();
        // return \Socialite::with('weibo')->scopes(array('email'))->redirect();
    }
    //获取登录用户信息
    public function callback() {
        $oauthUser = \Socialite::with('weibo')->user();
        var_dump($oauthUser->getId());
        var_dump($oauthUser->getNickname());
        var_dump($oauthUser->getName());
        var_dump($oauthUser->getEmail());
        var_dump($oauthUser->getAvatar());
    }
}
