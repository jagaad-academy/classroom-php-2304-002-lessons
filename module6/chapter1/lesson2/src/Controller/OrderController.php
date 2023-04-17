<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class OrderController
{
    public function __invoke(string $name): Response
    {
        return new Response('this is the order controller. hello, ' . $name);
    }
}
