<?php

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use ReallySimpleJWT\Token;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->safeLoad();

$app = AppFactory::create();

$app->get('/v1/jwt/secret', function (Request $request, Response $response, $args) {
    echo bin2hex(random_bytes(32));
    return $request;
});

$app->post('/v1/jwt', function (Request $request, Response $response, $args) {
    $params = json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

    $dbName = $_ENV['MARIADB_DB_NAME'];
    $dbUser = $_ENV['MARIADB_DB_USER'];
    $passUser = $_ENV['MARIADB_DB_USER_PASSWORD'];

    $requestUser = $params['email'] ?? null;
    $requestUserPass = $params['pass'] ?? null;

    if(is_null($requestUser) || is_null($requestUserPass)){
        return new JsonResponse(['message' => 'Bad request, authentication failed'], 401);
    }

    try {
        $pdo = new \PDO('mysql:host=lesson4_mariadb;dbname=' . $dbName, $dbUser, $passUser);
        $sql = "SELECT * FROM users WHERE email=?";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(1, $requestUserclear);
        $stm->execute();

        $user = $stm->fetch(PDO::FETCH_ASSOC);
        if($user) {
            if($user['password'] == $requestUserPass) {
                $payload = [
                    'iat' => time(),
                    'uid' => $user['id'],
                    'exp' => time() + 10,
                    'iss' => 'localhost',
                    'name' => $user['email']
                ];

                $jwt = Token::customPayload($payload, $_ENV['JWT_SECRET']);

                echo $jwt;
            }
        } else {
            return new JsonResponse(['message' => 'User not found, authentication failed'], 401);
        }

    } catch (PDOException $e){

    }

    return $response;
});

$app->run();
