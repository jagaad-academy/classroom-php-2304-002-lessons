<?php

use Laminas\Diactoros\Response\HtmlResponse;
use ShortenUrl\Controller\FindUrlController;
use ShortenUrl\Controller\HomeController;
use ShortenUrl\Controller\ListUrlsController;
use ShortenUrl\Controller\OpenApiController;
use ShortenUrl\Controller\ShortenUrlController;
use ShortenUrl\Controller\ShortUrlRedirectController;
use Slim\Factory\AppFactory;

require __DIR__ . '/../boot.php';

// Create Container using PHP-DI
$container = require __DIR__ . '/../config/container.php';

// Set container to create App with on AppFactory
AppFactory::setContainer($container);
$app = AppFactory::create();

/*
 * @todo
 * quality tools
 * create good README
 */

$app->get('/', HomeController::class);
$app->get('/openapi', OpenApiController::class);
$app->get('/apidocs', fn () => new HtmlResponse(file_get_contents(__DIR__ . '/apidocs.html')));
$app->get('/{short-url}', new ShortUrlRedirectController($container));
$app->get('/v1/url', new ListUrlsController($container));
$app->post('/v1/url/shorten', new ShortenUrlController($container));
$app->get('/v1/url/{id}', new FindUrlController($container));

$app->addErrorMiddleware(true, true, true);

$app->run();