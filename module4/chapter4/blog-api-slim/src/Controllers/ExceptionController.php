<?php

namespace BlogAPiSlim\Controllers;

use BlogAPiSlim\Middlewares\MiddlewareAfter;
use Fig\Http\Message\StatusCodeInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ExceptionController extends A_Controller
{
    public function notFound(Request $request, Response $response): Response|\Slim\Psr7\Message
    {
        $middleware = new MiddlewareAfter();
        $payload = json_encode(['status' => 404, 'message' => 'not found'], JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        $response->withStatus(StatusCodeInterface::STATUS_NOT_FOUND);
        $response->withHeader('Content-Type', 'application/json');
        $middleware->logResponse($response);
        return $response;
    }
}
