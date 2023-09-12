<?php
/**
 * arrayiterator.php
 * hennadii.shvedko
 * 12.09.2023
 */

$arr = [1,5,11,10];

$arrayObj = new ArrayObject($arr);
$iterator = $arrayObj->getIterator();
$arrayObj->asort();

while($iterator->valid()){
    echo $iterator->current() . PHP_EOL;
    $iterator->next();
}
