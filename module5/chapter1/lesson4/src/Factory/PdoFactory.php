<?php

declare(strict_types=1);

namespace Lesson4\Factory;

final class PdoFactory
{
    public static function make(): \PDO
    {
        return new \PDO(
            'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASS']
        );
    }
}