<?php

require_once __DIR__ . '/../boot.php';

use PdoApp\Repository\AuthorRepositoryFactory;

$faker = Faker\Factory::create();

$repository = AuthorRepositoryFactory::make();

$repository->persist([
    'id' => $faker->uuid,
    'name' => $faker->name,
    'country' => $faker->country,
]);

$repository->persist([
    'id' => $faker->uuid,
    'name' => $faker->name,
    'country' => $faker->country,
 ]);

$repository->persist([
    'id' => $faker->uuid,
    'name' => $faker->name,
    'country' => $faker->country,
]);

$repository->flush();