<?php

declare(strict_types=1);

namespace RestApi\School;

final class DeleteStudent
{
    public function __construct(private \PDO $conn)
    {
    }

    public function delete(string $id): string
    {
        $stm = $this->conn->prepare('DELETE FROM students WHERE id=:id');
        $stm->bindParam(':id', $id);
        $stm->execute();

        return $id;
    }
}