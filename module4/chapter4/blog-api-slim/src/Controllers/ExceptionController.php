<?php

namespace BlogAPiSlim\Controllers;

use BlogAPiSlim\Middlewares\MiddlewareAfter;
use Laminas\Diactoros\Response\JsonResponse;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ExceptionController extends A_Controller
{
    public function notFound(Request $request, Response $response)
    {
        $middleware = new MiddlewareAfter($this->container);
        $payload = ['status' => 404, 'message' => 'not found'];
        $response = new JsonResponse($payload, 404);
        $middleware->logResponse($response);
        return $response;
    }
}
