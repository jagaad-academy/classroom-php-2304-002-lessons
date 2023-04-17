<?php

require __DIR__ . '/../vendor/autoload.php';

use Bramus\Router\Router;

// Create Router instance
$router = new Router();

$router->get('/', function() {
    echo '<h1>I am in the index :)</h1>';
});

$router->get('/create/task', function() {
    echo 'This is the route to create a task';
});

$router->get('/about', function() {
    echo 'About Page Contents';
});

//$router->set404(function () {
//    echo 'Page not found';
//});

$router->run();