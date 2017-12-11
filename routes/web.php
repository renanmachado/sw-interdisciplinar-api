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
    return "SW - INTERDISCIPLINAR API <br>
    		RENAN MACHADO
    ";
});

$router->group(['prefix' => 'clients'], function () use ($router) {
    $router->get('/', ['as' => 'profile', 'uses' => 'ClientController@index']);
    $router->post('/', ['as' => 'profile', 'uses' => 'ClientController@create']);
});
