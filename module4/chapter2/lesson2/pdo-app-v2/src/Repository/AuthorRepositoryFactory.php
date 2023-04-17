<?php

declare(strict_types=1);

namespace PdoApp\Repository;

use PdoApp\Database\PdoConnectionFactory;

final class AuthorRepositoryFactory
{
    public static function make(): AuthorRepository
    {
        $pdo = PdoConnectionFactory::make();
        return new AuthorRepositoryFromPdo($pdo);
    }
}
