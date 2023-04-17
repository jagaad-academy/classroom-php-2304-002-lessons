<?php

declare(strict_types=1);

namespace OopTodoList\Model;

class Task
{
    private string $id;
    private string $title;
    private bool $isDone;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->id = uniqid('task_id', true);
        $this->isDone = false;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }
}
