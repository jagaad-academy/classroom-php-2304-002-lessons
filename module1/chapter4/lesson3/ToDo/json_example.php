<?php

$testArray = [
    'students' => [
        'student1',
        'student2',
        'student3',
    ],
    'classes' => [
        'class1',
        'class2',
        'class3',
    ],
    'iteration' => 2
];

//print_r($testArray);

//echo PHP_EOL;
$jsonData = json_encode($testArray);

print_r($jsonData);

$arrayData = json_decode($jsonData, true);

print_r($arrayData['students']);
