<?php

use Router\Router;

require '../vendor/autoload.php';

// GLOBAL CONSTANTS
// dirname($path) -> Parent directory of path
// __DIR__ -> Full path of current file

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

// DB
define('DB_NAME', 'oop-training-blog');
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\BlogController@index');
$router->get('/posts/{id}', 'App\Controllers\BlogController@show');

$router->run();

// var_dump($params);