<?php

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Ramsey\Uuid\Uuid;
use SimpleShop\Middleware\CustomErrorHandler;
use SimpleShop\Model\Cart;
use SimpleShop\Model\Product;
use SimpleShop\Repository\ProductRepository;
use SimpleShop\Service\CreateProduct;
use Slim\Factory\AppFactory;

require __DIR__ . '/../bootstrap.php';

$container = require __DIR__ . '/../config/container.php';

$app = AppFactory::create(container: $container);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->post('/product', function (Request $request, Response $response, $args) use ($app) {
    $params = json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

    $repository = $app->getContainer()?->get(ProductRepository::class);
    $product = (new CreateProduct($repository))->create($params);

    return new JsonResponse([
        'id' => $product->id()
    ]);
});

$customErrorHandler = new CustomErrorHandler($app);

$displayErrorDetails = $_ENV['APP_ENV'] !== 'prod';

$errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);

$app->run();
