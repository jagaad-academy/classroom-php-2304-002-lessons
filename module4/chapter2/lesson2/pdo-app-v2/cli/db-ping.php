<?php

require_once __DIR__ . '/../boot.php';

$pdo = \PdoApp\Database\PdoConnectionFactory::make();

while (true) {
    echo '.';
    $result = $pdo->query("SELECT 'my-slow-query', SLEEP(15)");
    $result->fetchAll();
    sleep(5);
}
