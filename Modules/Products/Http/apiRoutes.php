<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'products', 'middleware' => ['api.token']], function (Router $router) {
    $router->get('/', [
        'as' => 'api.products.index',
        'uses' => 'ProductsController@index',
    ]);
});
