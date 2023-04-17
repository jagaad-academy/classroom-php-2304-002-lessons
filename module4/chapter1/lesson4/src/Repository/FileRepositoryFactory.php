<?php

declare(strict_types=1);

namespace Uphpload\Repository;

final class FileRepositoryFactory
{
    public static function make(): FileRepository
    {
        return new FileRepositoryFromFilesystem();
    }
}
