<?php

namespace BlogAPiSlim\Models;

use Exception;
use Faker\Factory;

class Posts extends A_Model
{
    public int $id;
    public string $title;
    public int $authorId;
    public string $img;
    public string $content;

    private string $dbTableName = 'posts';

    function findAll(): array
    {
        $sql = "SELECT * FROM " . $this->dbTableName;
        $stm = $this->getPdo()->prepare($sql);
        $stm->execute();
        $posts = $stm->fetchAll();
        return $posts;
    }

    function findById(): array
    {
        // TODO: Implement findById() method.
    }



    function insert(array $data): int
    {
        $sql = "INSERT INTO " . $this->dbTableName . " (title, author_id, image, content) VALUES (?,?,?,?)";
        $stm = $this->getPdo()->prepare($sql);
        $stm->execute([$data[0], $data[1], $data[2], $data[3]]);
        return $this->getPdo()->lastInsertId();
    }

    function insertWithData(array $data): void
    {
        $sql = "INSERT INTO " . $this->dbTableName . " (title, author_id, image, content) VALUES (?,?,?,?)";
        $stm = $this->getPdo()->prepare($sql);
        $stm->execute([$data[0], $data[1], $data[2], $data[3]]);
    }

    function delete(int $id): bool
    {
        $sql = "DELETE FROM " .$this->dbTableName . " WHERE id=?";
        try {
            $stm = $this->getPdo()->prepare($sql);
            $stm->execute([$id]);
        } catch (\PDOException $exception){
            return false;
        }

        return true;
    }

    function fakeData(): bool
    {
        $faker = Factory::create('en_US');
        $author = new Authors();

        try {
            for ($i = 0; $i < 50; $i++) {
                $authorId = $faker->numberBetween(1000, 5000);
                $author->insertWithData([
                    $authorId,
                    $faker->firstName,
                    $faker->lastName
                ]);

                $this->insertWithData([
                    $faker->sentence(6, true),
                    $authorId,
                    $faker->imageUrl(200, 150, 'cats'),
                    $faker->paragraph(5, true)
                ]);
            }
        } catch (Exception $exception){
            return false;
        }

        return true;
    }

}
