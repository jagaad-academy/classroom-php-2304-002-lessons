<?php

namespace PdoApp\Repository;

use PdoApp\Model\Author;

interface AuthorRepository
{
    public function persist(Author $author): self;
    public function flush(): void;

    /** @return Author[] */
    public function findAll(): array;
}
