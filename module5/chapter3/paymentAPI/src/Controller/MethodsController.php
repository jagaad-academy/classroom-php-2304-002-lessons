<?php
/**
 * MethodsController.php
 * hennadii.shvedko
 * 26.09.2023
 */

namespace PaymentApi\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use PaymentApi\Exception\DBException;
use PaymentApi\Model\Methods;
use PaymentApi\Repository\MethodsRepositoryDoctrine;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class MethodsController
{
    /**
     * @throws DBException
     */
    public function indexAction(Request $request, Response $response): ResponseInterface
    {
//        new PDO('', '', '');
//        throw new DBException('DBException message! DB error!', 500);
        return new JsonResponse(['message'=>'test'], 200);
    }
}
