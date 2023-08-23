<?php

namespace BlogApi\Controllers;

use Laminas\Diactoros\Response;

abstract class A_Controller
{
    protected Response $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    /**
     * @param array $data
     * @return Response
     */
    protected function generateResponse(array $data = []): Response
    {
        $this->response->getBody()->write(json_encode($data));
        return $this->response->withAddedHeader('content-type', 'application/json')->withStatus(200);
    }

    abstract function indexAction(): Response;
    abstract function updateAction(): bool;
    abstract function insertAction(): bool;
    abstract function deleteAction(): bool;
}
