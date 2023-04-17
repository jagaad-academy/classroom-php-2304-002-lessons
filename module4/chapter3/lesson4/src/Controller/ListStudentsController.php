<?php

declare(strict_types=1);

namespace RestApi\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use RestApi\DbConnection;
use RestApi\School\GetStudent;
use OpenApi\Annotations as OA;

final class ListStudentsController
{
    /**
     * @OA\Get(
     *     path="/v1/school/students",
     *     description="Returns all students.",
     *     tags={"Students"},
     *     @OA\Response(
     *         response=200,
     *         description="student response"
     *     )
     * )
     */
    public function __invoke(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $conn = DbConnection::connect();
        $getStudent = new GetStudent($conn);
        $data = $getStudent->all();
        return new JsonResponse($data, 200);
    }
}
