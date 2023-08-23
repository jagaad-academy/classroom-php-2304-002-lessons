<?php

namespace BlogApi\Controllers;

use BlogApi\Models\Posts;
use Laminas\Diactoros\Response;

class PostsController extends A_Controller
{
    function indexAction(): Response
    {
        $posts = new Posts();
        $posts = $posts->findAll();

        return $this->generateResponse($posts);
    }

    function updateAction(): bool
    {
        // TODO: Implement updateAction() method.
    }

    function insertAction(): bool
    {
        // TODO: Implement insertAction() method.
    }

    function deleteAction(): bool
    {
        // TODO: Implement deleteAction() method.
    }

    function faker(): string
    {
        $posts = new Posts();
        if($posts->fakeData()){
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
