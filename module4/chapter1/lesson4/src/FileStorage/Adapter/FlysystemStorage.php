<?php

declare(strict_types=1);

namespace Uphpload\FileStorage\Adapter;

use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Uphpload\FileStorage\File;
use Uphpload\FileStorage\FileStorage;

class FlysystemStorage implements FileStorage
{
    public function storeAll(array $files): void
    {
        foreach ($files as $file) {
            $this->store($file);
        }
    }

    public function store(File $file): void
    {
        $rootPath = __DIR__ . '/../../../public/uploads/';

        $adapter = new LocalFilesystemAdapter($rootPath);
        $filesystem = new Filesystem($adapter);

        $filesystem->write($file->name(), (string)file_get_contents((string)$file->path()));
    }
}
