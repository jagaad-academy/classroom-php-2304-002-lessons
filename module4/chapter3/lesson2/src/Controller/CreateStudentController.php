<?php

declare(strict_types=1);

namespace RestApi\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use RestApi\DbConnection;
use RestApi\School\CreateStudent;

final class CreateStudentController
{
    /**
     * @OA\Post(
     *     path="/v1/school/students",
     *     description="Create new student.",
     *     @OA\Response(
     *         response="200",
     *         description="The ID of the student"
     *     )
     * )
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // get the client request body
        $data = json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        // insert the data into the database
        $conn = DbConnection::connect();
        $createStudent = new CreateStudent($conn);
        $id = $createStudent->create($data);

        // create the response
        $res = [
            'status' => 'success',
            'data' => [ 'id' => $id ]
        ];

        return new JsonResponse($res, 201);
    }
}
