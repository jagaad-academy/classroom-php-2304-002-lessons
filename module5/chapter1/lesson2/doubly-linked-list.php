<?php

$list = new SplDoublyLinkedList();

$list->push('test1');
$list->push('test2');
$list->push('test3');
$list->push('test4');

$list->rewind();
echo $list->current() . PHP_EOL;

$list->next();
echo $list->current() . PHP_EOL;

$list->prev();
echo $list->current() . PHP_EOL;
echo $list->pop();

echo PHP_EOL . '----------------------------' . PHP_EOL;

for ($list->next();  $list->valid(); $list->next()) {
    echo $list->current() . PHP_EOL;
}
