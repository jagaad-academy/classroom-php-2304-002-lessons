<?php

declare(strict_types=1);

require_once "vendor/autoload.php";

use BlogApi\Controllers\PostsController;
use Dotenv\Dotenv;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$dotenv = Dotenv::createImmutable(__DIR__); //$_ENV
$dotenv->safeLoad();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;

// map a route
$router->map('GET', '/v1/posts', [new BlogApi\Controllers\PostsController, 'indexAction']);
$router->map('POST', '/v1/posts', [new BlogApi\Controllers\PostsController, 'insertAction']);
$router->map('PUT', '/v1/posts/{id}', function (ServerRequestInterface $request, array $args): ResponseInterface {
    $postsController = new PostsController();
    $response = $postsController->updateAction((int)$args['id']);
    return $response;
});
$router->map('DELETE', '/v1/posts/{id}', function (ServerRequestInterface $request, array $args): ResponseInterface {
    $postsController = new PostsController();
    $response = $postsController->deleteAction((int)$args['id']);
    return $response;
});
//$router->map('GET', '/posts/faker', [new BlogApi\Controllers\PostsController, 'faker']);

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
