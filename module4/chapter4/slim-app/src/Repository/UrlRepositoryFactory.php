<?php

declare(strict_types=1);

namespace ShortenUrl\Repository;

use DI\Container;

final class UrlRepositoryFactory
{
    public function __invoke(Container $container): UrlRepository
    {
        $pdo = $container->get('db');
        return new UrlRepositoryFromPdo($pdo);
    }
}
