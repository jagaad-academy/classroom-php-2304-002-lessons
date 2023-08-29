<?php

namespace BlogAPiSlim\Controllers;

use Slim\Psr7\Response;

abstract class A_Controller
{
    protected function render(array $data, Response $response): Response|\Slim\Psr7\Message
    {
        $payload = json_encode($data, JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }
}
