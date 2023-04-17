<?php

declare(strict_types=1);

namespace ShortenUrl\Controller;

use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class HomeController
{
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $data = ['app' => 'shorten-url', 'version' => '1.0'];
        return new JsonResponse($data);
    }
}
