<?php

namespace OnlineStoreProject\Entities;

abstract class A_Entities implements I_Entities
{
    public static ?\PDO $connection = null;

    public function __construct()
    {
        if(self::$connection === null){
            self::$connection = new \PDO("mysql:host=".DB_HOST.";dbname=" . DB_NAME, DB_USER, DB_USER_PASS);
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
        $className = str_replace('OnlineStoreProject\Entities\\', '', $classNameSpaceWithName);
        return $className;
    }
}
