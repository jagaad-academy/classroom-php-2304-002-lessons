<?php

namespace BlogAPiSlim\App;

use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use PDO;

/**
 * DB class which is responsible for connection to DB using PDO
 *
 * @category
 * @package
 * @author   Hennadii Shvedko
 * @licence
 * @link
 */
final class DB
{
    /**
     * Connection od PDO class property
     *
     * @var PDO|null
     */
    public ?PDO $connection = null;

    /**
     * Constructor of DB class
     *
     * @param  Container $container - container
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function __construct(Container $container)
    {
        if($this->connection == null) {
            $dbHost = $container->get('settings')['DB_HOST'];
            $dbName = $container->get('settings')['DB_NAME'];
            $dbUser = $container->get('settings')['DB_USER'];
            $dbPassword = $container->get('settings')['DB_PASSWORD'];
            $dsn = "mysql:host=$dbHost;dbname=$dbName";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->connection = new PDO($dsn, $dbUser, $dbPassword, $options);
        }
    }
}
