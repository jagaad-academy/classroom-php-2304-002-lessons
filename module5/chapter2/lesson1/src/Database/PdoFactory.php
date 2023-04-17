<?php

declare(strict_types=1);

namespace OrmLesson\Database;

use DI\Container;
use PDO;

final class PdoFactory
{
    public function __invoke(Container $container): PDO
    {
        $db = $container->get('settings')['db'];
        $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['user'], $db['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
