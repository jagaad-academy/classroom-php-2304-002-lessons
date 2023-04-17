<?php

$array = new SplFixedArray(10);

$array[1] = 'test0';
$array[5] = 'test1';
$array[6] = 'test2';
$array[7] = 'test3';

foreach ($array as $item) {
    echo $item . PHP_EOL;
}
