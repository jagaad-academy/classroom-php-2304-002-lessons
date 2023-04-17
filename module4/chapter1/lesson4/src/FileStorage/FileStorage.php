<?php

declare(strict_types=1);

namespace Uphpload\FileStorage;

interface FileStorage
{
    public function store(File $file): void;

    /**
     * @param File[] $files
     * @return void
     */
    public function storeAll(array $files): void;
}
