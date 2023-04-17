<?php

require_once __DIR__ . '/../boot.php';

$repository = \PdoApp\Repository\AuthorRepositoryFactory::make();

$faker = \Faker\Factory::create();

$author = new \PdoApp\Model\Author(
    $faker->uuid,
    filter_input(INPUT_POST, 'name')
);

$repository
    ->persist($author)
    ->flush();

echo 'author created!';