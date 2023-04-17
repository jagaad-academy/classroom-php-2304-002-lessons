<?php

declare(strict_types=1);

namespace Uphpload\Repository;

use Uphpload\FileStorage\File;

interface FileRepository
{
    public function store(File $file): void;

    /**
     * @param File[] $files
     * @return void
     */
    public function storeAll(array $files): void;

    /** @return File[] */
    public function findAll(): array;
}
