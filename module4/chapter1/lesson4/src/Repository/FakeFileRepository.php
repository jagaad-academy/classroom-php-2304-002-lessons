<?php

declare(strict_types=1);

namespace Uphpload\Repository;

use Uphpload\FileStorage\File;

final class FakeFileRepository implements FileRepository
{
    public function storeAll(array $files): void
    {
        echo 'fake files stored all :) <br>';
    }

    public function store(File $file): void
    {
        echo 'fake file stored :) <br>';
    }

    public function findAll(): array
    {
        return [];
    }
}
