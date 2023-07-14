<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . "/env/settings.php";
require_once __DIR__ . "/vendor/autoload.php";

use OnlineStoreProject\App\Router;

$mainControllerNameSpace = 'OnlineStoreProject\\Controllers\\MainController';
$cartControllerNameSpace = 'OnlineStoreProject\\Controllers\\CartController';
$productsControllerNameSpace = 'OnlineStoreProject\\Controllers\\ProductsController';
$usersControllerNameSpace = 'OnlineStoreProject\\Controllers\\UsersController';

Router::add('/', 'get', $mainControllerNameSpace, 'index');
Router::add('/login', 'get', $usersControllerNameSpace, 'login');
Router::add('/login', 'post', $usersControllerNameSpace, 'authenticate');
Router::add('/logout', 'get', $usersControllerNameSpace, 'logout');
Router::add('/register', 'get', $usersControllerNameSpace, 'index');
Router::add('/register', 'post', $usersControllerNameSpace, 'add');
Router::add('/cart', 'get', $cartControllerNameSpace, 'index');
Router::add('/notfound', 'get', $mainControllerNameSpace, 'pageNotFound');

//Chapter 3 PDO has to be added
//@TODO: adjust Entities in order to communicate with DB
//@TODO: Handle the requests

Router::run();
