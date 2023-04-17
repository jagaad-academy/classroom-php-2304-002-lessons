<?php

declare(strict_types=1);

namespace RestApi\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use RestApi\DbConnection;
use RestApi\School\DeleteStudent;

final class DeleteStudentController
{
    /**
     * @OA\Delete(
     *     path="/v1/school/students/{id}",
     *     description="Delete a student by ID.",
     *     tags={"Students"},
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
        // insert the data into the database
        $conn = DbConnection::connect();
        $deleteStudent = new DeleteStudent($conn);
        $id = $deleteStudent->delete($args['id']);

        // create the response
        $res = [
            'status' => 'success',
            'data' => [ 'id' => $id ]
        ];

        return new JsonResponse($res, 200);
    }
}
