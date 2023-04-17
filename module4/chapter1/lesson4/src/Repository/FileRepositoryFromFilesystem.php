<?php

declare(strict_types=1);

namespace Uphpload\Repository;

use Uphpload\FileStorage\File;

final class FileRepositoryFromFilesystem implements FileRepository
{
    private const STORAGE_FILES = __DIR__ . '/../../storage/filenames.json';

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
        $listOfFiles = $this->findAll();

        $listOfFileNames = [];
        foreach ($listOfFiles as $storedFile) {
            $listOfFileNames[] = $storedFile->name();
        }

        $listOfFileNames[] = $file->name();
        file_put_contents(self::STORAGE_FILES, json_encode($listOfFileNames));
    }

    public function findAll(): array
    {
        if (! file_exists(self::STORAGE_FILES)) {
            file_put_contents(self::STORAGE_FILES, json_encode([]));
        }
        $fileNames = (array)json_decode((string)file_get_contents(self::STORAGE_FILES), true);
        $files = [];
        /** @var string $name */
        foreach ($fileNames as $name) {
            $files[] = File::fromFileName($name);
        }
        return $files;
    }
}
