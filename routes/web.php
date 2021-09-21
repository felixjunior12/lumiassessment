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


$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['prefix' => 'gifs'], function () use ($router) {
        $router->get('/trending', 'Controller@getTrendingGifs');
    });

    $router->group(['prefix' => 'nasa'], function () use ($router) {
        $router->get('/apod', 'Controller@getAstronomyPicture');
    });

    $router->group(['prefix' => 'movies'], function () use ($router) {
        $router->get('/search', 'Controller@searchMovie');
    });

});