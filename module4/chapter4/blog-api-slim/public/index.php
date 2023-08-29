<?php

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->safeLoad();

$app = AppFactory::create();

$app->get('/v1/posts','\BlogAPiSlim\Controllers\PostsController:indexAction');
$app->post('/v1/posts','\BlogAPiSlim\Controllers\PostsController:createAction');
$app->put('/v1/posts/{id}','\BlogAPiSlim\Controllers\PostsController:updateAction');
$app->delete('/v1/posts/{id}','\BlogAPiSlim\Controllers\PostsController:deleteAction');

$app->get('/v1/posts/fill-with-fake-data','\BlogAPiSlim\Controllers\PostsController:fakeAction');

$app->run();
