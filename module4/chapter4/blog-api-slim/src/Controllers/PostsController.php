<?php

namespace BlogAPiSlim\Controllers;

use Assert\AssertionFailedException;
use BlogAPiSlim\Models\Content;
use BlogAPiSlim\Models\Image;
use BlogAPiSlim\Models\Posts;
use BlogAPiSlim\Models\Title;
use Fig\Http\Message\StatusCodeInterface;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * @OA\Info(
 *   title="Blog API",
 *   version="1.0.0",
 *   @OA\Contact(
 *     email="hennadii.shvedko@jagaad.com"
 *   )
 * )
 */
class PostsController extends A_Controller
{
    /**
     * @OA\Get(
     *     path="/v1/posts",
     *     description="Returns all posts",
     *     @OA\Response(
     *          response=200,
     *          description="posts response",
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *      ),
     *   )
     * )
     * @return \Laminas\Diactoros\Response
     */
    public function indexAction(Request $request, Response $response): ResponseInterface
    {
        $posts = new Posts($this->container);
        $data = $posts->findAllWithAuthorInformation();
        return $this->render($data, $response);
    }

    /**
     * @OA\Post(
     *     path="/v1/posts",
     *     description="Creates a post in blog",
     *     @OA\RequestBody(
     *          description="Input data format",
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="title",
     *                      description="title of new post",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="authorId",
     *                      description="ID of author of new post",
     *                      type="integer",
     *                  ),
     *                  @OA\Property(
     *                      property="img",
     *                      description="Image URL of new post",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="content",
     *                      description="Content of new post",
     *                      type="string",
     *                  ),
     *              ),
     *          ),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="post has been created successfully",
     *      ),
     *     @OA\Response(
     *          response=400,
     *          description="bad request",
     *      ),
     *      @OA\Response(
     *            response=500,
     *            description="Internal server error",
     *        ),
     *   ),
     * )
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function createAction(Request $request, Response $response): ResponseInterface
    {
        $requestBody = $request->getParsedBody();

        $authorId = filter_var($requestBody['authorId'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($requestBody['title'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $img = filter_var($requestBody['img'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        $posts = new Posts($this->container);
        try {
            $posts->insertWithData(
                [
                    new Title($title),
                    $authorId,
                    new Image($img),
                    new Content($requestBody['content'])
                ]
            );
        } catch (AssertionFailedException $e) {
            $responseData = [
                'code' => StatusCodeInterface::STATUS_BAD_REQUEST,
                'message' => $e->getMessage()
            ];
            $response = new JsonResponse($responseData, StatusCodeInterface::STATUS_BAD_REQUEST);
            return $this->render($responseData, $response);
        }

        $responseData = [
            'code' => StatusCodeInterface::STATUS_OK,
            'message' => 'Post has been published.'
        ];

        return $this->render($responseData, $response);
    }

    /**
     * @OA\Put(
     *     path="/v1/posts/{id}",
     *     description="update a single post from blog based on post ID",
     *     @OA\Parameter(
     *          description="ID of post to update",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              format="int64",
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *           description="Input data format",
     *           @OA\MediaType(
     *               mediaType="multipart/form-data",
     *               @OA\Schema(
     *                   type="object",
     *                   @OA\Property(
     *                       property="title",
     *                       description="title of new post",
     *                       type="string",
     *                   ),
     *                   @OA\Property(
     *                       property="authorId",
     *                       description="ID of author of new post",
     *                       type="integer",
     *                   ),
     *                   @OA\Property(
     *                       property="img",
     *                       description="Image URL of new post",
     *                       type="string",
     *                   ),
     *                   @OA\Property(
     *                       property="content",
     *                       description="Content of new post",
     *                       type="string",
     *                   ),
     *               ),
     *           ),
     *       ),
     * @OA\Response(
     *           response=200,
     *           description="post has been created successfully",
     *       ),
     * @OA\Response(
     *           response=400,
     *           description="bad request",
     *       ),
     *     @OA\Response(
     *                response=404,
     *            description="Post not found",
     *        ),
     *     @OA\Response(
     *            response=500,
     *            description="Internal server error",
     *        ),
     *  )
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function updateAction(Request $request, Response $response, $args = []): ResponseInterface
    {
        $requestBody = $this->getRequestBodyAsArray($request);

        $id = $args['id'];
        $authorId = filter_var($requestBody['authorId'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($requestBody['title'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $img = filter_var($requestBody['img'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $posts = new Posts($this->container);
        try {
            $posts->updateWithData(
                [
                    $title,
                    $authorId,
                    $img,
                    new Content($requestBody['content']),
                    $id
                ]
            );
        } catch (AssertionFailedException $e) {
            $responseData = [
                'code' => StatusCodeInterface::STATUS_BAD_REQUEST,
                'message' => $e->getMessage()
            ];
            $response = new JsonResponse($responseData, StatusCodeInterface::STATUS_BAD_REQUEST);
            return $this->render($responseData, $response);
        }

        $responseData = [
            'code' => StatusCodeInterface::STATUS_OK,
            'message' => 'Post has been updated.'
        ];

        return $this->render($responseData, $response);
    }

    /**
     * @OA\Delete(
     *     path="/v1/posts/{id}",
     *     description="deletes a single post from blog based on pot ID",
     *     @OA\Parameter(
     *         description="ID of post to delete",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             format="int64",
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="post has been deleted"
     *     ),
     * @OA\Response(
     *            response=400,
     *            description="bad request",
     *        ),
     * @OA\Response(
     *                 response=404,
     *             description="Post not found",
     *         ),
     * @OA\Response(
     *             response=500,
     *             description="Internal server error",
     *         ),
     *   )
     */
    public function deleteAction(Request $request, Response $response, $args = []): ResponseInterface
    {
        $id = $args['id'];
        $posts = new Posts($this->container);
        $posts->delete($id);
        $responseData = [
            'code' => StatusCodeInterface::STATUS_OK,
            'message' => 'Post has been deleted.'
        ];
        return $this->render($responseData, $response);
    }

    public function fakeAction(Request $request, Response $response, $args = []): ResponseInterface
    {
        $posts = new Posts($this->container);
        $posts->fakeData($this->container);

        $responseData = [
            'code' => StatusCodeInterface::STATUS_OK,
            'message' => 'fake data has been inserted'
        ];
        return $this->render($responseData, $response);
    }
}
