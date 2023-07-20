<?php

namespace OnlineStoreProject\Entities;

use PDO;

abstract class A_Entities implements I_Entities
{
    public static ?\PDO $connection = null;

    public function __construct()
    {
        if(!(self::$connection instanceof PDO)){
            self::$connection = new \PDO(DB_DRIVER . ":host=".DB_HOST.";dbname=" . DB_NAME, DB_USER, DB_USER_PASS);
        }
    }

    public function deleteById(int $id): bool
    {
        $conn = self::$connection;
        $entity = $this->getEntityName();
        $stmt = $conn->prepare("DELETE FROM " . $entity::DB_TABLE_NAME . " WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $result = $stmt->execute();
        return $result;
    }

    private function getEntityName(): string
    {
        $classNameSpaceWithName = get_class($this);
        return $classNameSpaceWithName;
    }

    public function findAll(): array
    {
        $conn = self::$connection;
        $entity = $this->getEntityName();
        $stmt = $conn->prepare("SELECT * FROM " . $entity::DB_TABLE_NAME);
        $result = [];
        $stmt->execute();
        foreach ($stmt as $row) {
            $result[] = $row;
        }

        return $result;
    }
}
