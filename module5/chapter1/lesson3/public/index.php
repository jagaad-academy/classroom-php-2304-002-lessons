<?php

use APIAuthLesson\Middlewares\APITokenAuthMiddleware;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$app = AppFactory::create();

$baseAuth = new Tuupola\Middleware\HttpBasicAuthentication([
    "users" => [
        "hennadii" => "123",
        "alex" => "456"
    ]
]);

$jwt = new Tuupola\Middleware\JwtAuthentication([
    "secret" => $_ENV['JWT_SECRET']
]);

$app->get('/v1/shops', function (Request $request, Response $response, $args) {
    $faker = Faker\Factory::create();
    $shops = [];
    for ($i = 0; $i < 50; $i++) {
        $shops[] = [
            'name' => $faker->name,
            'warehouse' => $faker->name,
            'city' => $faker->city
        ];
    }
    return new JsonResponse($shops);
})->add(new APITokenAuthMiddleware());

$app->get('/v1/warehouses', function (Request $request, Response $response, $args) {
    $faker = Faker\Factory::create();
    $shops = [];
    for ($i = 0; $i < 50; $i++) {
        $shops[] = [
            'name' => $faker->name,
            'city' => $faker->city
        ];
    }
    return new JsonResponse($shops);
})->add($baseAuth);


$app->get('/v1/products', function (Request $request, Response $response, $args) {

//    echo "<pre>";
//    var_dump($request->getAttribute('token'));
//    die;

    $faker = Faker\Factory::create();
    $shops = [];
    for ($i = 0; $i < 50; $i++) {
        $shops[] = [
            'name' => $faker->name,
            'category' => $faker->name
        ];
    }
    return new JsonResponse($shops);
})->add($jwt);

$app->run();
