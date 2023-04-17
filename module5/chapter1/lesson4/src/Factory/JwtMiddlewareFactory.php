<?php

declare(strict_types=1);

namespace Lesson4\Factory;

use Tuupola\Middleware\JwtAuthentication;

final class JwtMiddlewareFactory
{
    public static function make(): JwtAuthentication
    {
        return new JwtAuthentication([
            'secret' => $_ENV['JWT_SECRET']
        ]);
    }
}
