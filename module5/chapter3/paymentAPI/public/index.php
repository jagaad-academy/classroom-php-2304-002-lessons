<?php

use PaymentApi\Middleware\CustomErrorHandler;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../container/container.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->safeLoad();
//APP_ROOT
$app = AppFactory::createFromContainer(container: $container);

//Methods
$app->group('/v1/methods', function (RouteCollectorProxy $group) {
    $group->get('', '\PaymentApi\Controller\MethodsController:indexAction');
    $group->post('', '\PaymentApi\Controller\MethodsController:createAction');
    $group->delete('/{id:[0-9]+}', '\PaymentApi\Controller\MethodsController:removeAction');
    $group->get('/deactivate/{id:[0-9]+}', '\PaymentApi\Controller\MethodsController:deactivateAction');
    $group->get('/reactivate/{id:[0-9]+}', '\PaymentApi\Controller\MethodsController:reactivateAction');
    $group->put('/{id:[0-9]+}', '\PaymentApi\Controller\MethodsController:updateAction');
});

//Customers
$app->group('/v1/customers', function (RouteCollectorProxy $group) {
    $group->get('', '\PaymentApi\Controller\CustomersController:indexAction');
    $group->post('', '\PaymentApi\Controller\CustomersController:createAction');
    $group->delete('/{id:[0-9]+}', '\PaymentApi\Controller\CustomersController:removeAction');
    $group->put('/{id:[0-9]+}', '\PaymentApi\Controller\CustomersController:updateAction');
    $group->get('/deactivate/{id:[0-9]+}', '\PaymentApi\Controller\CustomersController:deactivateAction');
    $group->get('/reactivate/{id:[0-9]+}', '\PaymentApi\Controller\CustomersController:reactivateAction');
});

//Payments (transactions)
$app->group('/v1/payments', function (RouteCollectorProxy $group) {
    $group->get('', '\PaymentApi\Controller\PaymentsController:indexAction');
    $group->post('', '\PaymentApi\Controller\PaymentsController:createAction');
    $group->delete('/{id:[0-9]+}', '\PaymentApi\Controller\PaymentsController:removeAction');
    $group->put('/{id:[0-9]+}', '\PaymentApi\Controller\PaymentsController:updateAction');
});

//Basket
$app->group('/v1/basket', function (RouteCollectorProxy $group) {
    $group->get('', '\PaymentApi\Controller\BasketController:indexAction');
    $group->post('', '\PaymentApi\Controller\BasketController:createAction');
    $group->delete('/{id:[0-9]+}', '\PaymentApi\Controller\BasketController:removeAction');
    $group->put('/{id:[0-9]+}', '\PaymentApi\Controller\BasketController:updateAction');
});


$displayErrors = $_ENV['APP_ENV'] != 'production';
//$displayErrors = false;
$customErrorHandler = new CustomErrorHandler($app);

$errorMiddleware = $app->addErrorMiddleware($displayErrors, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);

$app->run();
