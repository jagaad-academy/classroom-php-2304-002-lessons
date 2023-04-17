<?php

declare(strict_types=1);

namespace RestApi\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use RestApi\DbConnection;
use RestApi\School\UpdateStudent;

final class UpdateStudentController
{
    /**
     * @OA\Put(
     *     path="/v1/school/students/{id}",
     *     description="Update a student by ID.",
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
     *     @OA\RequestBody(
     *          description="Student to be inserted.",
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/Student")
     *          )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="The ID of the student"
     *     )
     * )
     */
    public function __invoke(ServerRequestInterface $request, array $args): ResponseInterface
    {
        // get the client request body
        $data = json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        // insert the data into the database
        $conn = DbConnection::connect();
        $updateStudent = new UpdateStudent($conn);
        $id = $updateStudent->update($args['id'], $data);

        // create the response
        $res = [
            'status' => 'success',
            'data' => [ 'id' => $id ]
        ];

        return new JsonResponse($res, 200);
    }
}
