<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    //デフォルト設定
    $router->get('/', 'HomeController@index')->name('home');

    //Product
    $router->resource('/products', ProductController::class);

});
