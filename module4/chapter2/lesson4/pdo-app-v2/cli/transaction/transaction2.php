<?php

require_once __DIR__ . '/../../boot.php';

$sql = file_get_contents(__DIR__ . '/../db-authors.sql');

$faker = Faker\Factory::create();

$pdo = \PdoApp\Database\PdoConnectionFactory::make();

$pdo->beginTransaction();

$authorStm = $pdo->prepare('INSERT INTO authors VALUES (?, ?, ?)');
//$bookStm = $pdo->prepare('INSERT INTO books VALUES (?, ?, ?)');

try {
    $authorId = $faker->uuid;
    $authorStm->execute([ $authorId, $faker->name, $faker->country ]);

    $stm = $pdo->prepare('SELECT name FROM authors WHERE id=?');
    $stm->execute([ $authorId ]);

    $result = $stm->fetch(PDO::FETCH_ASSOC);

    var_dump($result);

    throw new \Exception('something went wrong');

    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
}

echo 'executed';
