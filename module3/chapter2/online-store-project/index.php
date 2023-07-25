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
Router::add('/cart/remove/{id}', 'get', $cartControllerNameSpace, 'delete');
Router::add('/checkout', 'get', $cartControllerNameSpace, 'checkout');
Router::add('/thankyou', 'get', $cartControllerNameSpace, 'thankyou');
Router::add('/notfound', 'get', $mainControllerNameSpace, 'pageNotFound');
Router::add('/products/all', 'get', $productsControllerNameSpace, 'allProducts');
Router::add('/product/{id}', 'get', $productsControllerNameSpace, 'index');
Router::add('/product/{id}', 'post', $cartControllerNameSpace, 'add');

Router::run();
