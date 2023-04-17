<?php

declare(strict_types=1);

namespace Uphpload\Controller;

use Uphpload\FileStorage\File;
use Uphpload\FileStorage\FileStorage;
use Uphpload\FileStorage\FileStorageFactory;
use Uphpload\Repository\FileRepository;
use Uphpload\Repository\FileRepositoryFactory;

final class UploadFileController
{
    private FileStorage $fileStorage;
    private FileRepository $fileRepository;

    public function __construct()
    {
        $this->fileStorage = FileStorageFactory::make();
        $this->fileRepository = FileRepositoryFactory::make();
    }

    public function handle(): void
    {
        $fileToUpload = File::withUniqueName(
            $_FILES['fileToUpload']['name'],
            $_FILES['fileToUpload']['tmp_name']
        );

        $anotherFile = File::withUniqueName(
            $_FILES['anotherFile']['name'],
            $_FILES['anotherFile']['tmp_name']
        );

        $files = [ $fileToUpload, $anotherFile ];

        $this->fileStorage->storeAll($files);
        $this->fileRepository->storeAll($files);
    }
}
