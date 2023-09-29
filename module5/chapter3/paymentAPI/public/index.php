<?php

use PaymentApi\Middleware\CustomErrorHandler;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../container/container.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->safeLoad();
//APP_ROOT
$app = AppFactory::create(container: $container);

$app->get('/v1/methods', '\PaymentApi\Controller\MethodsController:indexAction');

$displayErrors = $_ENV['APP_ENV'] != 'production';

$customErrorHandler = new CustomErrorHandler($app);

$errorMiddleware = $app->addErrorMiddleware($displayErrors, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);

$app->run();
