<?php

namespace HennadiiShvedko\Lesson2;

use PDO;

final class DB
{
    public PDO $pdo;

    public function __construct()
    {
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASSWORD'];

        $dsn = "mysql:host=$dbHost;dbname=$dbName";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $dbUser, $dbPass, $options);
    }
}
