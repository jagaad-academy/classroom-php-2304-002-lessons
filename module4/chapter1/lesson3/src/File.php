<?php

declare(strict_types=1);

namespace FileUploadsExample;

final class File
{
    private string $fileNameAsUnique;

    public function __construct(
        private string $fileTempDir,
        string $fileName,
    ){
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $this->fileNameAsUnique = uniqid('file', true) . '.' . $fileExt;
    }

    public function fileTempDir(): string {
        return $this->fileTempDir;
    }

    public function fileNameAsUnique(): string {
        return $this->fileNameAsUnique;
    }
}
