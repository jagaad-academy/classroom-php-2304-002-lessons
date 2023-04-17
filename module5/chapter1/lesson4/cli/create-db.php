<?php

$pdo = new \PDO('mysql:host=phpcoursem5.mariadb;dbname=test', 'root', 'root');
$sql = file_get_contents(__DIR__ . '/db.SQL');
$pdo->exec($sql);

echo 'Database created!';