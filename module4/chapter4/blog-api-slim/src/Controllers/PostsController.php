<?php

namespace BlogAPiSlim\Controllers;

use BlogAPiSlim\Models\Posts;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class PostsController extends A_Controller
{
    public function indexAction(Request $request, Response $response): Response|\Slim\Psr7\Message
    {
        $posts = new Posts($this->container);
        $data = $posts->findAll();
        return $this->render($data, $response);
    }

    public function createAction(Request $request, Response $response): Response|\Slim\Psr7\Message
    {
        $data = ['0' => ['title' =>'create']];
        return $this->render($data, $response);
    }

    public function updateAction(Request $request, Response $response, $args = []): Response|\Slim\Psr7\Message
    {
        $id = $args['id'];
        $data = ['0' => ['id' =>$id, 'action' => 'update']];
        return $this->render($data, $response);
    }
    public function deleteAction(Request $request, Response $response, $args = []): Response|\Slim\Psr7\Message
    {
        $id = $args['id'];
        $data = ['0' => ['id' =>$id, 'action' => 'delete']];
        return $this->render($data, $response);
    }

    public function fakeAction(Request $request, Response $response, $args = []): Response|\Slim\Psr7\Message
    {
//        $data = ['message' => 'fake data has been created!'];
//        return $this->render($data, $response);
        $args = [
            'name' => $args['name']
        ];
        return $this->view->render($response, 'index.php', $args);
    }
}
