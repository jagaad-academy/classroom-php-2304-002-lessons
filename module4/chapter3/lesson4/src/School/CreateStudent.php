<?php

namespace RestApi\School;

use Ramsey\Uuid\Uuid;

class CreateStudent
{
    public function __construct(private \PDO $conn)
    {
    }

    public function create(array $data): string
    {
        $stm = $this->conn->prepare(
            'INSERT INTO students VALUES (:id, :name, :last_name, :country)'
        );

        $id = Uuid::uuid4()->toString();

        $stm->bindParam(':id', $id);
        $stm->bindParam(':name', $data['name']);
        $stm->bindParam(':last_name', $data['last_name']);
        $stm->bindParam(':country', $data['country']);

        $stm->execute();

        return $id;
    }
}
