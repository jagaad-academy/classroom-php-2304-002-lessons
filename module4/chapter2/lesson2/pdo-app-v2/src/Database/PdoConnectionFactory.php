<?php

declare(strict_types=1);

namespace PdoApp\Database;

use PDO;

final class PdoConnectionFactory
{
    public static function make(): PDO
    {
        $params = require __DIR__ . '/../../config/db.php';

        $dsn = "mysql:host=$params[host];dbname=$params[name]";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $pdo = new PDO($dsn, $params['user'], $params['pass'], $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $pdo;
    }
}
