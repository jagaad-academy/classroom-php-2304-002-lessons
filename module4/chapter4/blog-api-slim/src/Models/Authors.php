<?php

namespace BlogAPiSlim\Models;

class Authors extends A_Model
{
    public int $id;
    public string $firstName;
    public string $lastName;

    private string $dbTableName = 'authors';

    function findAll(): array
    {
        return [];
    }

    function findById(): array
    {
        return [];
    }

    function update(int $id): bool
    {
        return false;
    }

    function insert(array $data): int
    {
        return -1;
    }

    function delete(int $id): bool
    {
        return false;
    }

    function insertWithData(array $data): void
    {
        $sql = "INSERT INTO " . $this->dbTableName . " (id, first_name, last_name) VALUES (?,?,?)";
        $stm = $this->getPdo()->prepare($sql);
        $stm->execute([$data[0], $data[1], $data[2]]);
    }
}
