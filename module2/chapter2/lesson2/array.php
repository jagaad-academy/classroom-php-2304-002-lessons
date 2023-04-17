<?php

/*
$array = [
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
];
*/

//var_dump((int)false);

/*
$array = [
    "foo" => "bar",
    42    => 24,
    "multi" => [
         "dimensional" => [
             "array" => "foo"
        ]
    ]
];

var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);
*/

/*
$book = [
    'title' => 'Modern PHP',
    'pages' => 100,
    'edition' => 2,
    'author' => [
        'id' => 'ID123456',
        'name' => 'Robert C. Martin',
        'birth_year' => 1956,
    ],
];

echo 'Book name: ' . $book['title'] . PHP_EOL;
echo 'Book author: ' . $book['author']['name'];
*/

/*
echo '1st student: ' . $students[0]['name'];

echo "\n----------------\n";

var_dump($students);

echo "\n----------------\n";

print_r($students);
*/

/*
$students = [
    [$student1, $grade1],
    [$student2, $grade2],
];
*/

/*
$secondElement = getArray()['company'];

echo $secondElement;

function getArray() {
    return [
        'name' => 'Lucas',
        'company' => 'Jagaad',
    ];
}
*/

/*
$list = [
    'name' => 'Lucas',
    'company' => 'Jagaad',
];

foreach ($list as $key => $value) {
    echo "key: $key, value: $value\n";
}
*/

/*
$fruits = array("lemon", "orange", "banana", "apple");

echo count($fruits);
*/

/*
echo "---- list not sorted ---------------- \n";
print_r($fruits);

echo "\n\n ---- list sorted ---------------- \n";
sort($fruits);
print_r($fruits);

echo "\n\n ---- list shuffled ---------------- \n";
shuffle($fruits);
print_r($fruits);
*/

$listOfNumbers = [1, 2, 4, 7, 10, 20, 123, 11, 88];

echo "---- original list of numbers ---------------- \n";
print_r($listOfNumbers);

$onlyEvenNumbers = function ($item) {
    return ($item % 2 === 0);
};

$evenNumbers = array_filter($listOfNumbers, $onlyEvenNumbers);

echo "---- new list of numbers ---------------- \n";
print_r($evenNumbers);
