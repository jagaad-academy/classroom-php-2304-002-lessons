<?php

$array = new ArrayIterator(['test0', 'test10']);

$array->append('test1');
$array->append('test2');
$array->append('test3');

$array['8'] = 'test4';

//echo $array->count() . PHP_EOL;

echo $array->offsetGet('8');

//foreach ($array as $key => $item) {
//    echo $key . ' - ' . $item . PHP_EOL;
//}
