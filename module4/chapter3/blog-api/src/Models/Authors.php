<?php

namespace BlogApi\Models;

class Authors extends A_Model
{
    public int $id;
    public string $firstName;
    public string $lastName;

    private string $dbTableName = 'authors';

    function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    function findById(): array
    {
        // TODO: Implement findById() method.
    }

    function update(int $id): bool
    {
        // TODO: Implement update() method.
    }

    function insert(): bool
    {
        // TODO: Implement insert() method.
    }

    function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    function insertWithData(array $data): void
    {
        $sql = "INSERT INTO " . $this->dbTableName . " (id, first_name, last_name) VALUES (?,?,?)";
        $stm = $this->getPdo()->prepare($sql);
        $stm->execute([$data[0], $data[1], $data[2]]);
    }
}
