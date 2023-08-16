<?php

use Faker\Provider\en_GB\Payment;

require_once "vendor/autoload.php";

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

for ($i = 0; $i < 10; $i++) {
    echo $faker->name . " - " . $faker->safeEmail, "\n";
}
//echo Payment::creditCardNumber();
// generate data by accessing properties
//echo $faker->name . PHP_EOL;
//echo $faker->address . PHP_EOL;

die;
