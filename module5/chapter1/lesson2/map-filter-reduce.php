<?php

$list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

print_r($list);

$evenNumbers = array_filter($list, static fn($n) => ($n % 2) === 0);
$addOneToEachNumber = array_map(static fn ($n) => $n + 1, $list);
$sum = array_reduce($list, static function ($carry, $n) {
    return $carry + $n;
});

print_r($sum);