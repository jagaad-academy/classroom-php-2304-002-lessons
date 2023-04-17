<?php

require_once __DIR__ . '/../boot.php';

$sql = file_get_contents(__DIR__ . '/db.sql');

$pdo = \PdoApp\Database\PdoConnectionFactory::make();
$faker = Faker\Factory::create();

$pdo->exec($sql);
$stm = $pdo->prepare('INSERT INTO books VALUES (?, ?, ?)');

$bookIds = [];
for ($i=0; $i<100; $i++) {
    $bookId = $faker->uuid;
    $stm->execute([$bookId, $faker->streetName, $faker->year]);
    $bookIds[] = $bookId;
}

$stm = $pdo->prepare('INSERT INTO authors VALUES (?, ?, ?)');

$authorIds = [];
for ($i=0; $i<25; $i++) {
    $authorId = $faker->uuid;
    $stm->execute([$authorId, $faker->name, $faker->country]);
    $authorIds[] = $authorId;
}

$stm = $pdo->prepare('INSERT INTO books_authors VALUES (?, ?)');

for ($i=0; $i<500; $i++) {
    $bookId = $bookIds[random_int(0, 99)];
    $authorId = $authorIds[random_int(0, 24)];

    try {
        $stm->execute([$bookId, $authorId]);
    } catch (PDOException $e) {
        error_log($e->getMessage());
    }
}

/*
SELECT
	a.name AS author_name,
    b.title AS book_title,
    b.year AS book_year
FROM authors a
JOIN books_authors ba ON ba.author_id=a.id
JOIN books b ON ba.book_id=b.id
 */

echo 'Executed';

