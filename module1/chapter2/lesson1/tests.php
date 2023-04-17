<?php

// adding a conflict comment

$someInput = '2022-09-23';

$list = explode("-", $someInput);

//var_dump($list);

// a list of months that contains number keys 
$monthList = [
    // key => value
    '09' => 'Sep',
    '10' => 'Nov',
];

//echo $monthList['09'];

$month = $list[1];

echo $monthList[$month];

// iteration over each $item of the $list
//foreach ($list as $item) {
//    echo $item . PHP_EOL;
//}