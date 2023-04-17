<?php

declare(strict_types=1);

namespace RestApi\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use RestApi\DbConnection;
use RestApi\School\GetStudent;
use OpenApi\Annotations as OA;

final class GetStudentController
{
    /**
     * @OA\Get(
     *     path="/v1/school/students/{id}",
     *     description="Returns the student based on the ID parameter added to the route path.",
     *     @OA\Parameter(
     *         description="ID of student to fetch",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="The ID of the student"
     *     )
     * )
     */
    public function __invoke(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $conn = DbConnection::connect();
        $getStudent = new GetStudent($conn);
        $data = $getStudent->get($args['id']);
        return new JsonResponse($data, 200);
    }
}
