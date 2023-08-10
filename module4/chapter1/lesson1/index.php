<?php

use Jagaad\Module4\QrCode;

require_once __DIR__ . "/vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$route = new Route('/test', ['_controller' => QrCode::class, 'method' => 'index']);
$route = new Route('/', ['_controller' => QrCode::class, 'method' => 'renderCode']);

$routes = new RouteCollection();
$routes->add('test_routing', $route);

// Init RequestContext object
$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

// Init UrlMatcher object
$matcher = new UrlMatcher($routes, $context);
try {
    $parameters = $matcher->match($context->getPathInfo());

    $obj = new $parameters['_controller']();
    $obj->{$parameters['method']}();
} catch (Exception $exception){
    echo "No routes found!";
    die;
}
