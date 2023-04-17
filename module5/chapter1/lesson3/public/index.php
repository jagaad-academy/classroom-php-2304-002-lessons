<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use TokenLesson\Middleware\SimpleTokenAuthMiddleware;

$app = AppFactory::create();

$basicAuth = new Tuupola\Middleware\HttpBasicAuthentication([
    'users' => [ $_ENV['BASIC_AUTH_USER'] => $_ENV['BASIC_AUTH_PASS'] ]
]);

$jwtAuth = new Tuupola\Middleware\JwtAuthentication([
    'secret' => $_ENV['JWT_TOKEN']
]);

$app->get('/v1/electronics', function (Request $request, Response $response, $args) {
    $faker = Faker\Factory::create();

    $data = [];
    for ($i=0; $i<100; $i++) {
        $data[] = [
            'id' => $faker->uuid,
            'name' => $faker->word,
        ];
    }

    return new JsonResponse($data);
})->add($basicAuth);

$app->get('/v1/cities', function (Request $request, Response $response, $args) {
    $faker = Faker\Factory::create();

    $data = [];
    for ($i=0; $i<200; $i++) {
        $data[] = [
            'id' => $faker->uuid,
            'city' => $faker->city,
        ];
    }

    return new JsonResponse($data);
})->add(new SimpleTokenAuthMiddleware());

$app->get('/v1/people', function (Request $request, Response $response, $args) {
    /*
     * check: https://jwt.io/
     * token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJwaHAgY291cnNlIHRlc3QiLCJuYW1lIjoiTHVjYXMiLCJhZG1pbiI6dHJ1ZSwiaWF0IjoxNTE2MjM5MDIyfQ.3uzxrBxl1nn6Oh9pbjqZHDw6fA5grQWa51f22sIKLcE
     */

    $token = $request->getAttribute('token');
    $isAdmin = isset($token['admin']) && $token['admin'] === true;

    if (! $isAdmin) {
        return new JsonResponse(['message' => 'not authorized'], 401);
    }

    $faker = Faker\Factory::create();

    $data = [];
    for ($i=0; $i<200; $i++) {
        $data[] = [
            'id' => $faker->uuid,
            'name' => $faker->name,
        ];
    }

    return new JsonResponse($data);
})->add($jwtAuth);


$app->run();