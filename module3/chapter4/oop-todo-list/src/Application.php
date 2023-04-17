<?php

declare(strict_types=1);

namespace OopTodoList;

use OopTodoList\Controller\ControllerManager;
use OopTodoList\Controller\CreateTaskController;
use OopTodoList\Controller\DeleteTaskController;
use OopTodoList\Controller\HomeController;
use OopTodoList\Model\TaskRepositoryFromFilesystem;

final class Application
{
    public function run(): void
    {
        $repository = new TaskRepositoryFromFilesystem();

        $manager = new ControllerManager();

        $manager
            ->add(new CreateTaskController($repository))
            ->add(new DeleteTaskController($repository))
            ->add(new HomeController($repository));

        $response = $manager->handle($_REQUEST);

        echo $response['html'] ?? var_dump($response);
    }
}
