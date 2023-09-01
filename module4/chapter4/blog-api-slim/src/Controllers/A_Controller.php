<?php

namespace BlogAPiSlim\Controllers;

use DI\Container;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\PhpRenderer;

abstract class A_Controller
{

    protected Container $container;
    /**
     * @var ?PDO
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

    /**
     * @param  array<mixed>      $data
     * @param  ResponseInterface $response
     * @return ResponseInterface
     */
    protected function render(array $data, ResponseInterface $response): ResponseInterface
    {
        $payload = json_encode($data, JSON_PRETTY_PRINT);
        $response->getBody()->write((string)$payload);
        return $response->withHeader('Content-Type', 'application/json');
    }


    /**
     * @param  Request $request
     * @return mixed[]
     */
    protected function getRequestBodyAsArray(Request $request): array
    {
        $requestBody = explode('&', urldecode($request->getBody()->getContents()));
        $requestBodyParsed = [];
        foreach ($requestBody as $item) {
            $itemTmp = explode('=', $item);
            $requestBodyParsed[$itemTmp[0]] = $itemTmp[1];
        }
        return $requestBodyParsed;
    }
}
