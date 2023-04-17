<?php

namespace PdoApp\Repository;

interface AuthorRepository
{
    public function persist(array $authorData): self;
    public function flush(): void;
}
