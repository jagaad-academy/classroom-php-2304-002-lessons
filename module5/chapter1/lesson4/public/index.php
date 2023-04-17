<?php

use Firebase\JWT\JWT;
use Laminas\Diactoros\Response\JsonResponse;
use Lesson4\Factory\JwtMiddlewareFactory;
use Lesson4\Factory\PdoFactory;
use Lesson4\Middleware\OnlyAdminMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$authMiddleware = JwtMiddlewareFactory::make();

$app->post('/jwt', static function (Request $request, Response $response, $args) {
    $params = json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

    // it could have here a user db table validation

    $payload = [
        'sub' => '000000001',
        'name' => 'Lucas',
        'admin' => $params['admin'] ?? true,
        'iat' => 1356999524,
        'nbf' => 1357000000
    ];

    $jwt = JWT::encode($payload, $_ENV['JWT_SECRET']);

    return new JsonResponse(['token' => $jwt]);
});

$app->post('/people/insert', function (Request $request, Response $response, $args) {
    $faker = Faker\Factory::create();

    $pdo = PdoFactory::make();
    $stm = $pdo->prepare('INSERT INTO people VALUES (NULL, ?, ?)');
    for ($i=0;$i<10;$i++) {
        $stm->execute([ $faker->name, $faker->email ]);
    }

    return new JsonResponse(['message', 'people created']);
})
->add(new OnlyAdminMiddleware())
->add($authMiddleware);

$app->get('/people/read', function (Request $request, Response $response, $args) {
    $people = new ArrayIterator();

    $pdo = PdoFactory::make();
    $stm = $pdo->query('SELECT id, name, email FROM people');
    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        $people->append([
            'id' => $row['id'],
            'name' => $row['name']
        ]);
    }

    return new JsonResponse((array)$people);
});

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->run();