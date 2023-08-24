<?php

namespace BlogApi\Controllers;

use BlogApi\Models\Posts;
use Laminas\Diactoros\Response;
use OpenApi\Annotations as OA;

class PostsController extends A_Controller
{
    /**
     * @OA\Get(
     *     path="/v1/posts",
     *     description="Returns all posts",
     *     @OA\Response(
     *          response=200,
     *          description="posts response",
     *          @OA\JsonContent(
     *              type="array",
     *          ),
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

    function updateAction(int $id): Response
    {
        $posts = new Posts();
        $posts->update($id);
        return $this->generateResponse(['message' => 'updated']);
    }

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
