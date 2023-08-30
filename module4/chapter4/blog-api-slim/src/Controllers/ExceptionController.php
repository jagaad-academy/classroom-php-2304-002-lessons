<?php

namespace BlogAPiSlim\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ExceptionController extends A_Controller
{
    public function notFound(Request $request, Response $response): Response|\Slim\Psr7\Message
    {
        return $this->render(['status' => 404, 'message' => 'not found'], $response);
    }
}
