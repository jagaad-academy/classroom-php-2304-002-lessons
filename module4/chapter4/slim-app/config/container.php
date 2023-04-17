<?php

use DI\Container;
use ShortenUrl\Database\PdoFactory;
use ShortenUrl\Repository\UrlRepository;
use ShortenUrl\Repository\UrlRepositoryFactory;

$container = new Container();

$container->set('settings', static function() {
    return [
        'app' => [
            'domain' => $_ENV['APP_URL'] ?? 'localhost',
        ],
        'db' => [
            'host' => $_ENV['DB_HOST'] ?? 'localhost',
            'dbname' => $_ENV['DB_NAME'] ?? 'test',
            'user' => $_ENV['DB_USER'] ?? 'root',
            'pass' => $_ENV['DB_PASS'] ?? 'root',
        ]
    ];
});

$container->set('db', static function ($c) {
    $object = new PdoFactory();
    return $object($c);
});
$container->set(UrlRepository::class, static fn($c) => (new UrlRepositoryFactory())($c));

return $container;