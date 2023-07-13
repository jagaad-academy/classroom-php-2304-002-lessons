<?php

session_start();
require_once __DIR__ . "/env/settings.php";
require_once __DIR__ . "/vendor/autoload.php";

use OnlineStoreProject\App\Router;

$mainControllerNameSpace = 'OnlineStoreProject\\Controllers\\MainController';
$cartControllerNameSpace = 'OnlineStoreProject\Controllers\CartController';
$productsControllerNameSpace = 'OnlineStoreProject\Controllers\ProductsController';
$usersControllerNameSpace = 'OnlineStoreProject\Controllers\UsersController';

Router::add('/', 'get', $mainControllerNameSpace, 'index');
Router::add('/login', 'get', $usersControllerNameSpace, 'login');
Router::add('/logout', 'get', $usersControllerNameSpace, 'logout');
Router::add('/register', 'get', $usersControllerNameSpace, 'index');
Router::add('/register', 'post', $usersControllerNameSpace, 'add');

// On Lesson 3
//@TODO: Handle the requests
//@TODO: Create a routing
//@TODO: adjust Entities in order to communicate with DB

Router::run();
