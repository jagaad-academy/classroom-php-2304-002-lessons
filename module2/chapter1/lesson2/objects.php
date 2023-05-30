<?php

$obj = new stdClass;

$obj->name = "Deepak";
$obj->age = 21;
$obj->marks = 75;
$obj->class = "Math";
$obj->coaches = [
    'Raul',
    'Hennadii'
];

//print_r($obj);

$row = [
    'id' => 1,
    'studentName' => 'Hennadii',
    'class' => 'BE'
];

$stdClass = new stdClass;
foreach ($row as $key => $value){
    $stdClass->{$key} = $value;
}

print_r($stdClass);
