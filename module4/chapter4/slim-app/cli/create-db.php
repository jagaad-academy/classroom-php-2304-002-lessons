<?php

require __DIR__ . '/../boot.php';

$container = require __DIR__ . '/../config/container.php';

$sql = file_get_contents(__DIR__ . '/db.sql');

/** @var PDO $pdo */
$pdo = $container->get('db');
$pdo->exec($sql);

echo 'DB created!';
