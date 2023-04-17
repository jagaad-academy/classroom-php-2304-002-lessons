<?php

declare(strict_types=1);

namespace Uphpload\FileStorage;

use Uphpload\FileStorage\Adapter\FlysystemStorage;

final class FileStorageFactory
{
    public static function make(): FileStorage
    {
        //return new MyFileStorage();
        return new FlysystemStorage();
    }
}
