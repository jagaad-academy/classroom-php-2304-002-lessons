<?php

use OrmLesson\Repository\UserRepository;
use OrmLesson\Service\SingUpService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../bootstrap.php';

$container = require __DIR__ . '/../config/container.php';

$app = AppFactory::create(container: $container);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/user-test', function (Request $request, Response $response, $args) use ($app) {
    /** @var UserRepository $userRepository */
    $userRepository = $app->getContainer()->get(UserRepository::class);
    $signUpService = new SingUpService($userRepository);

    $u = $signUpService->singUp('lucas.oliveira2@jagaad.com');

    $user = $userRepository->find($u->id());

    $response->getBody()->write("User created! " . $user->email());
    return $response;
});

$app->run();