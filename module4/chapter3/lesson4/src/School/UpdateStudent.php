<?php

declare(strict_types=1);

namespace RestApi\School;

final class UpdateStudent
{
    public function __construct(private \PDO $conn)
    {
    }

    public function update(string $id, array $data): string
    {
        $stm = $this->conn->prepare(<<<SQL
            UPDATE students SET 
                name=:name, 
                last_name=:last_name, 
                country=:country
            WHERE id=:id
        SQL);

        $stm->bindParam(':name', $data['name']);
        $stm->bindParam(':last_name', $data['last_name']);
        $stm->bindParam(':country', $data['country']);
        $stm->bindParam(':id', $id);

        $stm->execute();

        return $id;
    }
}