<?php

namespace BlogAPiSlim\Controllers;

use DI\Container;
use PDO;
use Slim\Psr7\Response;
use Slim\Views\PhpRenderer;

abstract class A_Controller
{

    protected Container $container;
    /**
     * @var \?PDO
     */
    protected mixed $pdo;
    /**
     * @var PhpRenderer
     */
    protected mixed $view;

    public function __construct(Container $container)
    {
        $this->pdo = $container->get('database');
        $this->view = $container->get('view');
        $this->container = $container;
    }

    protected function render(array $data, Response $response): Response|\Slim\Psr7\Message
    {
        $payload = json_encode($data, JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }
}
