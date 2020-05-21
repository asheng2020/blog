<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->get('articles', 'ArticlesController@index');
    $router->get('articles/create', 'ArticlesController@create');
    $router->post('articles', 'ArticlesController@store');
    $router->get('articles/{id}/edit', 'ArticlesController@edit');
    $router->put('articles/{id}', 'ArticlesController@update');

});
