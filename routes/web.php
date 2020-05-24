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

