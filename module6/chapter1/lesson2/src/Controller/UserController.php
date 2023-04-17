<?php

declare(strict_types=1);

namespace App\Controller;

class UserController
{
    public function index(string $name): void
    {
        echo 'This is the user controller. Hello, ' . $name;
        die;
    }
}
