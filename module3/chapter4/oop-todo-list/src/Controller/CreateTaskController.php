<?php

declare(strict_types=1);

namespace OopTodoList\Controller;

use OopTodoList\Model\Task;
use OopTodoList\Model\TaskRepository;

class CreateTaskController implements Controller
{
    private TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function canHandle(string $action): bool
    {
        return $action === 'create-task';
    }

    public function handle(array $inputs = []): array
    {
        $title = (string)$inputs['task_title'];
        $task = new Task($title);
        $this->repository->store($task);
        return [
            'id' => $task->id(),
        ];
    }
}
