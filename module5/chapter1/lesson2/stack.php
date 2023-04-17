<?php

$stack = new SplStack();

$stack->push('test1');
$stack->push('test2');
$stack->push('test3');

foreach ($stack as $item) {
    echo $item . PHP_EOL;
}
