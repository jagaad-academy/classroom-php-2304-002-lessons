<?php

require_once __DIR__ . '/vendor/autoload.php';

$list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

//$even = collect($list)->filter(static fn ($n) => ($n % 2) === 0);
//$map = collect($list)->map(static fn ($n) => $n + 1);
//$reduce = collect($list)->reduce(static fn ($n, $carry) => $carry + $n);

$reduce = collect($list)
    ->filter(static fn ($n) => ($n % 2) === 0)
    ->map(static fn ($n) => $n + 1)
    ->reduce(static fn ($n, $carry) => $carry + $n);

print_r($reduce);
