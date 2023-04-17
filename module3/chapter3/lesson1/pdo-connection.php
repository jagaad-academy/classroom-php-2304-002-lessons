<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=personal_finance', 'root', '');
    $rows = $pdo->query('SELECT transaction_id, name, category FROM transactions', PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    die('Something went wrong. Please, try again later.');
}

//var_dump($rows->fetchAll());

/*

default result
[
    0 => 1,
    transaction_id => 1,
    1 => 'Test',
    name => 'Test',
    2 => 'Category Name',
    category => 'Category Name'
]

PDO::FETCH_ASSOC
[
    transaction_id => 1,
    name => 'Test',
    category => 'Category Name'
]

PDO::FETCH_NUM
[
    0 => 1,
    1 => 'Test',
    2 => 'Category Name'
]

*/
