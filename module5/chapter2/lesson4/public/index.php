<?php

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Ramsey\Uuid\Uuid;
use SimpleShop\Model\Cart;
use SimpleShop\Model\Product;
use SimpleShop\Repository\ProductRepository;
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
    $product = new Product(Uuid::uuid4(), $params['name']);

    /** @var ProductRepository $repository */
    $repository = $app->getContainer()->get(ProductRepository::class);
    $repository->store($product);

    // playing around with the Cart created/tested
    $cart = new Cart();
    $cart->set($product, 3);
    $cart->set(new Product(Uuid::uuid4(), 'fake-product'), 10);

    return new JsonResponse([
        'id' => $product->id(),
        'test-cart-qty' => $cart->quantity()
    ]);
});

$app->run();
