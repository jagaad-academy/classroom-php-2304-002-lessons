<?php

$arrayFirst = [
    1,
    2,
    3,
    'test',
    [1, 2, 3]
];

$arrayFirstOld = array(1, 2, 3, 'test', [1, 2, 3]);

$companies = [
    'name' => 'Jagaad',
    "country" => "Italy",
];

$companies['name'] = 'Facebook';

$arrayFirst[3] = 'test after changing';

$arrayFirst[] = 'new item';

$shopBasket = [
    'name1' => 't-shirt',
    'price1' => 20,
    'name2' => 'socks',
    'price2' => 5,
    'name3' => 'cap',
    'price3' => 10,
];

$shopBasket = [
    ['name' => 't-shirt', 'price' => 20],
    ['name' => 'socks', 'price' => 5],
    ['name' => 'cap', 'price' => 10],
];

$shopBasket3Dimensional = [
    ['name' => 't-shirt', 'price' => 20, 'address' => ['country' => 'USA', 'city' => 'New Your']],
    ['name' => 'socks', 'price' => 5, 'address' => ['country' => 'GB', 'city' => 'London']],
    ['name' => 'cap', 'price' => 10, 'address' => ['country' => 'Germany', 'city' => 'Berlin']],
];

print_r($shopBasket3Dimensional[0]['address']['country'] . PHP_EOL);

$shopBasket3Dimensional[0]['address']['country'] = 'France';

print_r($shopBasket3Dimensional[0]['address']['country'] . PHP_EOL);
