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
$router->post('/admin/posts/{id}/delete', 'App\Controllers\Admin\PostController@destroy');

try {
    $router->run();
} catch (HttpNotFoundException $e) {
    echo $e->notFoundError();
}