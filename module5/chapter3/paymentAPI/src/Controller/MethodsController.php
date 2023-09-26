<?php
/**
 * MethodsController.php
 * hennadii.shvedko
 * 26.09.2023
 */

namespace PaymentApi\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class MethodsController
{
    public function indexAction(Request $request, Response $response): ResponseInterface
    {
        throw new \PDOException('test');
        return new JsonResponse(['message'=>'test'], 200);
    }
}
