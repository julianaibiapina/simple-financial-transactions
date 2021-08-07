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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->post('/auth/login', 'AuthController@login');

$router->get('users/authenticated', 'UsersController@getAuthenticatedUser');

$router->get('users', 'UsersController@getUsers');

// $router->post('transaction', function (){
//     return true;
// });

$router->post('transaction', 'TransactionsController@transaction');