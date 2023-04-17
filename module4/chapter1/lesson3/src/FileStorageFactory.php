<?php

declare(strict_types=1);

namespace FileUploadsExample;

final class FileStorageFactory
{
    public static function make(): FileStorage
    {
        return new MyFileStorage();
    }
}
