<?php

namespace BlogAPiSlim\Controllers;

use BlogAPiSlim\Models\Authors;
use BlogAPiSlim\Models\Posts;
use Faker\Factory;
use Fig\Http\Message\StatusCodeInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class PostsController extends A_Controller
{
    public function indexAction(Request $request, Response $response): Response|\Slim\Psr7\Message
    {
        $posts = new Posts($this->container);
        $data = $posts->findAllWithAuthorInformation();
        return $this->render($data, $response);
    }

    public function createAction(Request $request, Response $response): Response|\Slim\Psr7\Message
    {
        $requestBody = $request->getParsedBody();

        $authorId = filter_var($requestBody['authorId'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($requestBody['title'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $img = filter_var($requestBody['img'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_var($requestBody['title'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $posts = new Posts($this->container);
        $posts->insertWithData([
            $title,
            $authorId,
            $img,
            $content
        ]);

        $responseData = [
            'code' => StatusCodeInterface::STATUS_OK,
            'message' => 'Post has been published.'
        ];

        return $this->render($responseData, $response);
    }

    public function updateAction(Request $request, Response $response, $args = []): Response|\Slim\Psr7\Message
    {
        $requestBody = $this->getRequestBodyAsArray($request);

        $id = $args['id'];
        $authorId = filter_var($requestBody['authorId'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($requestBody['title'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $img = filter_var($requestBody['img'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_var($requestBody['title'], FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $posts = new Posts($this->container);
        $posts->updateWithData([
            $title,
            $authorId,
            $img,
            $content,
            $id
        ]);

        $responseData = [
            'code' => StatusCodeInterface::STATUS_OK,
            'message' => 'Post has been updated.'
        ];

        return $this->render($responseData, $response);
    }
    public function deleteAction(Request $request, Response $response, $args = []): Response|\Slim\Psr7\Message
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

    public function fakeAction(Request $request, Response $response, $args = []): Response|\Slim\Psr7\Message
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
