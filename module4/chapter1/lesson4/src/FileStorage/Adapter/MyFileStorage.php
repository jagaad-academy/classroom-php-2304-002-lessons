<?php

declare(strict_types=1);

namespace Uphpload\FileStorage\Adapter;

use Uphpload\FileStorage\File;
use Uphpload\FileStorage\FileStorage;

final class MyFileStorage implements FileStorage
{
    private const TARGET_UPLOAD_DIR = __DIR__ . '/../public/uploads/';

    /**
     * @param File[] $files
     * @return void
     */
    public function storeAll(array $files): void
    {
        foreach ($files as $file) {
            $this->store($file);
        }
    }

    public function store(File $file): void
    {
        move_uploaded_file((string)$file->path(), self::TARGET_UPLOAD_DIR . $file->name());
    }
}
