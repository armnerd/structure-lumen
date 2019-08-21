<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'v1', 'middleware' => 'check', 'namespace' => 'V1'], function () use ($router) {
    // code @ version 1
});

// demo
$router->get('demo/success', 'DemoController@demoSuccess');
$router->get('demo/error/response', 'DemoController@demoError');
$router->get('demo/error/exception', 'DemoController@demoException');
$router->get('error/code', 'DemoController@errorCode');

// jwt
$router->group(['prefix' => 'token'], function ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
});
$router->group(['middleware' => 'token'], function () {
    Route::post('api', 'AuthController@api');
});
