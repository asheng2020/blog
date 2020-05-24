<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    // 文章
    $router->get('articles', 'ArticlesController@index');
    $router->get('articles/create', 'ArticlesController@create');
    $router->post('articles', 'ArticlesController@store');
    $router->get('articles/{id}/edit', 'ArticlesController@edit');
    $router->put('articles/{id}', 'ArticlesController@update');

    // 文章类别
    $router->get('categories', 'CategoriesController@index');
    $router->get('categories/create', 'CategoriesController@create');
    $router->post('categories', 'CategoriesController@store');
    $router->get('categories/{id}/edit', 'CategoriesController@edit');
    $router->put('categories/{id}', 'CategoriesController@update');

    // 日记
    $router->get('diaries', 'DiariesController@index');
    $router->get('diaries/create', 'DiariesController@create');
    $router->post('diaries', 'DiariesController@store');
    $router->get('diaries/{id}/edit', 'DiariesController@edit');
    $router->put('diaries/{id}', 'DiariesController@update');

    // 友链
    $router->get('links', 'LinksController@index');
    $router->get('links/create', 'LinksController@create');
    $router->post('links', 'LinksController@store');
    $router->get('links/{id}/edit', 'LinksController@edit');
    $router->put('links/{id}', 'LinksController@update');

});
