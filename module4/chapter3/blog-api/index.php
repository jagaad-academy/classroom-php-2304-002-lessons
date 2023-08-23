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
$router->map('GET', '/posts', function (ServerRequestInterface $request): ResponseInterface {
    $response = new Laminas\Diactoros\Response;
    $postsController = new PostsController();
    $postsJson = $postsController->indexAction();
    $response->getBody()->write($postsJson);
    return $response;
});

$router->get('/posts-test', [new BlogApi\Controllers\PostsController, 'indexAction']);

//$faker = Factory::create('de_DE');
//$test = $faker->bankAccountNumber;
//var_dump($test);

$router->map('GET', '/posts/faker', function (ServerRequestInterface $request): ResponseInterface {
    $response = new Laminas\Diactoros\Response;
    $postsController = new PostsController();
    $postsJson = $postsController->faker();
    $response->getBody()->write($postsJson);
    return $response;
});

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
