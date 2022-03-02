<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . '/');
define('BASE_URL', 'http://localhost/bddapp/');
define('DB_NAME', 'tpbdd');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');


$routeur = new Router($_GET['url']);

$routeur->get('/', 'App\COntrollers\PersonneController@index');
$routeur->get('/index.php', 'App\COntrollers\PersonneController@index');
$routeur->get('/gestion-des-membres', 'App\Controllers\PersonneController@membres');
$routeur->get('/membre/:id', 'App\Controllers\PersonneController@membre');
$routeur->post('/membre/delete/:id', 'App\Controllers\PersonneController@destroy');
$routeur->get('/nouveau-membre', 'App\Controllers\PersonneController@create');
$routeur->post('/membre/create', 'App\Controllers\PersonneController@createPost');
$routeur->get('/editer-membre/:id', 'App\Controllers\PersonneController@edit');
$routeur->post('/editer-membre/:id', 'App\Controllers\PersonneController@update');

$routeur->get('/gestion-des-chiens', 'App\Controllers\ChienController@chiens');
$routeur->get('/chien/:id', 'App\Controllers\ChienController@chien');
$routeur->post('/chien/delete/:id', 'App\Controllers\ChienController@destroy');
$routeur->get('/nouveau-chien', 'App\Controllers\ChienController@create');
$routeur->post('/chien/create', 'App\Controllers\ChienController@createPost');


$routeur->get('/login', 'App\Controllers\UserController@login');
$routeur->post('/login', 'App\Controllers\UserController@loginPost');
$routeur->get('/logout', 'App\Controllers\UserController@logout');

try {
    $routeur->run();
} catch (NotFoundException $e) {
    return $e->_404();
}