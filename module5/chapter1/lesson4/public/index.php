<?php


use APIDocker\Entities\Users;
use APIDocker\Repositories\UserRepository;
use APIDocker\Repositories\UserRepositoryDoctrine;
use Doctrine\ORM\EntityManager;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Slim\Factory\AppFactory;


require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/container.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->safeLoad();

$app = AppFactory::create(container: $container);

$container = $app->getContainer();

$app->get('/v1/users', function (Request $request, Response $response) use ($app) {
    $userRepository = $app->getContainer()->get(UserRepository::class);
    /** @var Users $user */
    $user = $userRepository->findById(1);
    return new JsonResponse($user->getEmail());
});

$app->get('/v1/users/testcom', function (Request $request, Response $response) use ($app) {
    $em = $app->getContainer()->get(EntityManager::class);

    $query = $em->createQuery('SELECT u.email FROM APIDocker\Entities\Users u WHERE u.email LIKE :email');

    $query->setParameter('email', '%test.com%');
    $users = $query->getResult();
    return new JsonResponse(['usersFound' => count($users)]);
});

$app->get('/v1/users/querybuilder', function (Request $request, Response $response) use ($app) {
    $em = $app->getContainer()->get(EntityManager::class);
    $qb = $em->createQueryBuilder();

    $qb->select('u')
        ->from('APIDocker\Entities\Users', 'u')
        ->where('u.id=5');

    $query = $qb->getQuery();
    $users = $query->getResult();
    $user = $users[0];
    return new JsonResponse(['userEmail' => $user->getEmail()]);
});

$app->post('/v1/users', function (Request $request, Response $response) use ($app) {
    $userInfo = json_decode($request->getBody()->getContents(), true);
    $user = new Users($userInfo['email']);
    /** @var UserRepositoryDoctrine $userRepository */
    $userRepository = $app->getContainer()->get(UserRepository::class);
    $userRepository->store($user);
    return new JsonResponse(['message' => 'user has been created']);
});

$app->delete('/v1/users/{id}', function (Request $request, Response $response, array $args) use ($app) {
    $userId = $args['id'];
    if((int)$userId != 0){
        /** @var UserRepositoryDoctrine $userRepository */
        $userRepository = $app->getContainer()->get(UserRepository::class);
        $user = $userRepository->findById($userId);
        if(is_null($user)){
            return new JsonResponse(['message' => 'user not found'], 404);
        }
        $userRepository->remove($user);
        return new JsonResponse(['message' => 'user has been removed']);
    }

    return new JsonResponse(['message' => 'please provide a userId'], 400);
});

$app->put('/v1/users/{id}', function (Request $request, Response $response, array $args) use ($app) {
    $userId = $args['id'];
    $userInfo = json_decode($request->getBody()->getContents(), true);
    if((int)$userId != 0){
        /** @var UserRepositoryDoctrine $userRepository */
        $userRepository = $app->getContainer()->get(UserRepository::class);
        $user = $userRepository->findById($userId);
        if(is_null($user)){
            return new JsonResponse(['message' => 'user not found'], 404);
        }

        $user->setEmail($userInfo['email']);
        $userRepository->update($user);
        return new JsonResponse(['message' => 'user has been updated']);
    }

    return new JsonResponse(['message' => 'please provide a userId'], 400);
});

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
        $pdo = new PDO('mysql:host=lesson4_mariadb;dbname=' . $dbName, $dbUser, $passUser);
        $sql = "SELECT * FROM users WHERE email=?";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(1, $requestUser);
        $stm->execute();
        $user = $stm->fetch(PDO::FETCH_ASSOC);
        if($user) {
            if($user['password'] == $requestUserPass) {
                $payload = [
                    'iat' => time(),
                    'uid' => $user['id'],
                    'exp' => time() + 3600,
                    'iss' => 'localhost',
                    'name' => $user['email']
                ];
                $jwt = JWT::encode($payload, $_ENV['JWT_SECRET'], 'HS256');
                return new JsonResponse(['token' => $jwt]);
            }
        } else {
            return new JsonResponse(['message' => 'User not found, authentication failed'], 401);
        }

    } catch (Exception $e){
        error_log($e->getMessage());
        return new JsonResponse(['message' => 'Internal server error'], 500);
    }

    return $response;
});

$errorMiddleware = $app->addErrorMiddleware(true, true, true);


$app->run();
