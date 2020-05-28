<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ArticlesController@home')->name('articles.home');
Route::redirect('/index', '/');

Route::get('/articles', 'ArticlesController@index')->name('articles.index');

Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('/diaries', 'DiariesController@index')->name('diaries.index');

Route::get('/links', 'LinksController@index')->name('links.index');

Route::get('/about', 'AboutController@index')->name('about.index');

Route::post('/search', 'ArticlesController@search');

// 引导用户到新浪微博的登录授权页面
Route::get('auth/weibo', 'AuthController@weibo');
// 用户授权后新浪微博回调的页面
Route::get('auth/callback', 'AuthController@callback');


Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
