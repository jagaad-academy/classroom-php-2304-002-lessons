<?php

$pdo = new \PDO('mysql:host=mariadb;dbname=test', 'root', 'root');
$sql = file_get_contents(__DIR__ . '/import.sql');
$pdo->exec($sql);

echo 'Database created!';
