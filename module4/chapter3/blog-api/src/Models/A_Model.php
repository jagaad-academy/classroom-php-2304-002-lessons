<?php

namespace BlogApi\Models;

use BlogApi\App\DB;
use PDO;

abstract class A_Model
{
    private ?PDO $pdo;

    abstract function findAll(): array;

    abstract function findById(): array;

    abstract function update(int $id): bool;

    abstract function insert(): bool;

    abstract function delete(int $id): bool;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->connection;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}
