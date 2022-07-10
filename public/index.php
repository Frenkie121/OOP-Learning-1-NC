<?php

use Router\Router;

require '../vendor/autoload.php';
require 'constants.php';


$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Controllers\BlogController@index');
$router->get('/posts/{id}', 'App\Controllers\BlogController@show');
$router->get('/tags/{id}/posts', 'App\Controllers\BlogController@byTags');

$router->run();