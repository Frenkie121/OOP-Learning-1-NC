<?php

use Router\Router;
use App\Exceptions\HttpNotFoundException;

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Controllers\BlogController@index');
$router->get('/posts/{id}', 'App\Controllers\BlogController@show');
$router->get('/tags/{id}/posts', 'App\Controllers\BlogController@byTags');

// Admin routes
$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');

$router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/store', 'App\Controllers\Admin\PostController@store');

$router->get('/admin/posts/{id}/edit', 'App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/{id}', 'App\Controllers\Admin\PostController@update');

$router->post('/admin/posts/{id}/delete', 'App\Controllers\Admin\PostController@destroy');

// AUTHENTICATION
$router->get('/login', 'App\Controllers\AuthController@loginForm');
$router->post('/login', 'App\Controllers\AuthController@login');
$router->get('/logout', 'App\Controllers\AuthController@logout');

try {
    $router->run();
} catch (HttpNotFoundException $e) {
    echo $e->notFoundError();
}