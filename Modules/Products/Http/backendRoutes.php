<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/products'], function (Router $router) {
    $router->bind('products', function ($id) {
        return app('Modules\Products\Repositories\ProductsRepository')->find($id);
    });
    $router->get('products', [
        'as' => 'admin.products.products.index',
        'uses' => 'ProductsController@index',
        'middleware' => 'can:products.products.index'
    ]);
    $router->get('products/create', [
        'as' => 'admin.products.products.create',
        'uses' => 'ProductsController@create',
        'middleware' => 'can:products.products.create'
    ]);
    $router->post('products', [
        'as' => 'admin.products.products.store',
        'uses' => 'ProductsController@store',
        'middleware' => 'can:products.products.create'
    ]);
    $router->get('products/{products}/edit', [
        'as' => 'admin.products.products.edit',
        'uses' => 'ProductsController@edit',
        'middleware' => 'can:products.products.edit'
    ]);
    $router->put('products/{products}', [
        'as' => 'admin.products.products.update',
        'uses' => 'ProductsController@update',
        'middleware' => 'can:products.products.edit'
    ]);
    $router->delete('products/{products}', [
        'as' => 'admin.products.products.destroy',
        'uses' => 'ProductsController@destroy',
        'middleware' => 'can:products.products.destroy'
    ]);
// append

});
