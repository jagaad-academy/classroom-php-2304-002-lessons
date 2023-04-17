<?php

declare(strict_types=1);

namespace PdoApp\Repository;

use PDO;
use PdoApp\Model\Author;

final class AuthorRepositoryFromPdo implements AuthorRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function persist(Author $author): AuthorRepository
    {
        if (! $this->pdo->inTransaction()) {
            $this->pdo->beginTransaction();
        }

        $stm = $this->pdo->prepare('INSERT INTO authors VALUES (?, ?, ?)');
        $stm->execute([ $author->id(), $author->name(), $author->country() ]);

        return $this;
    }

    public function flush(): void
    {
        if ($this->pdo->inTransaction()) {
            $this->pdo->commit();
        }
    }

    public function findAll(): array
    {
        $result = $this->pdo->query('SELECT id, name, country FROM authors ORDER BY name');

        $authors = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $authors[] = Author::populate($row);
        }

        return $authors;
    }
}
