<?php

namespace OopTodoList\Model;

interface TaskRepository
{
    /** @return Task[] */
    public function findAll(): array;
    public function store(Task $task): void;
    public function delete(string $id): void;
}
