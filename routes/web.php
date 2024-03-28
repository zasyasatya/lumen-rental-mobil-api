<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/mobil', 'MobilController@read');
$router->get('/mobil/{id}', 'MobilController@detail');
$router->post('/mobil/create', 'MobilController@create');
$router->post('/mobil/update/{id}', 'MobilController@update');
$router->delete('/mobil/delete/{id}', 'MobilController@delete');


$router->get('/', function () use ($router) {
    return $router->app->version();
});
