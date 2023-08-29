<?php

namespace BlogApi\Controllers;

use BlogAPiSlim\Models\Posts;
use Laminas\Diactoros\Response;

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
     *      )
     * )
     * @return Response
     */
    function indexAction(): Response
    {
        $posts = new Posts();
        $posts = $posts->findAll();

        return $this->generateResponse($posts);
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
     *                       property="image",
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
     *  )
     * @param int $id
     * @return Response
     */
    function updateAction(int $id): Response
    {
        $posts = new Posts();
        $posts->update($id);
        return $this->generateResponse(['message' => 'updated']);
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
     *                      property="image",
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
     * )
     * @return Response
     */
    function insertAction(): Response
    {
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_STRING);
        $authorId = filter_input(INPUT_POST, 'authorId', FILTER_SANITIZE_NUMBER_INT);
        $img = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_STRING);
        $posts = new Posts();
        $postId = $posts->insert([$title, $authorId, $img, $content]);
        return $this->generateResponse(['postId' => $postId]);
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
     * )
     */
    function deleteAction(int $id): Response
    {
        $posts = new Posts();
        $result = $posts->delete($id);

        if ($result) {
            return $this->generateResponse(['message' => 'removed']);
        } else {
            return $this->generateResponse(['message' => 'failed']);
        }
    }

    function faker(): string
    {
        $posts = new Posts();
        if ($posts->fakeData()) {
            return json_encode([
                'code' => 200,
                'message' => 'fake data generated'
            ]);
        } else {
            return json_encode([
                'code' => 500,
                'message' => 'fake data generation failed'
            ]);
        }
    }

}
