<?php

namespace HennadiiShvedko\Lesson1;

use Faker\Factory;
use PDO;

final class DB
{
    private PDO $pdo;

    /**
     *
     */
    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $db = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASSWORD'];

        $dsn = "mysql:host=$host;dbname=$db";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => true,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function fillWithFakeData()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $stmt = $this->pdo->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
            $stmt->execute([$faker->email, password_hash($faker->password,PASSWORD_DEFAULT)]);
        }
    }

    public function getAllUsers()
    {
        $email = 'Alfonso58@Nolan.com';
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        var_dump($user);
    }

    public function deleteUser($email)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $deleted = $stmt->rowCount();
        var_dump($deleted);
    }

    public function getLikeUsers($search)
    {
        $search = "%$search%";
        $stmt  = $this->pdo->prepare("SELECT * FROM users WHERE email LIKE ?");
        $stmt->execute([$search]);
        $data = $stmt->fetchAll();
        var_dump(count($data));

    }

    public function multipleSelects()
    {
        $search = "%Lexi%";
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email LIKE ?;SELECT * FROM users WHERE is_active=?");
        $stmt->execute([$search,0]);
        do {
            $data = $stmt->fetchAll();
            var_dump($data);
        } while ($stmt->nextRowset());
    }

    public function fillAuthorAndBooks()
    {
        $faker = Factory::create();
        $authorsIds = [];
        for ($i = 0; $i < 50; $i++) {
            $stmt = $this->pdo->prepare('INSERT INTO authors (name) VALUES (?)');
            $stmt->execute([$faker->name]);
            $authorsIds[] = $this->pdo->lastInsertId();
        }

        $booksIds = [];
        for ($i = 0; $i < 50; $i++) {
            $stmt = $this->pdo->prepare('INSERT INTO books (title) VALUES (?)');
            $stmt->execute([$faker->name]);
            $booksIds[] = $this->pdo->lastInsertId();
        }

        for ($i = 0; $i < 50; $i++){
            $randomIndex = rand(0, 49);
            $stmt = $this->pdo->prepare('INSERT INTO authors_to_books (author_id, book_id) VALUES (?, ?)');
            $stmt->execute([$authorsIds[$i], $booksIds[$randomIndex]]);
        }
    }
}
