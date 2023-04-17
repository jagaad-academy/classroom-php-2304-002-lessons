<?php

declare(strict_types=1);

namespace OopTodoList\Controller;

final class ControllerManager
{
    /** @var Controller[] */
    private array $controllers;

    public function add(Controller $controller): self
    {
        $this->controllers[] = $controller;
        return $this;
    }

    public function handle(array $inputs): array
    {
        $action = $inputs['action'] ?? '';
        foreach ($this->controllers as $controller) {
            if ($controller->canHandle($action)) {
                return $controller->handle($inputs);
            }
        }
        throw new \InvalidArgumentException('Sorry, I can not handle you request');
    }
}
