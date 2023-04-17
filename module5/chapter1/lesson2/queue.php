<?php

$queue = new SplQueue();

$queue->push('test1');
$queue->push('test2');
$queue->push('test3');

foreach ($queue as $item) {
    echo $item . PHP_EOL;
}