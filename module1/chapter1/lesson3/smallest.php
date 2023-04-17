<?php

/*
Create a PHP script that reads three values and outputs the smallest one.

Example:
Input: 10 7 11
Output: 7
*/

$input1 = $argv[1];
$input2 = $argv[2];
$input3 = $argv[3];

$min = $input1;

if ($min > $input2) {
    $min = $input2;
}

if ($min > $input3) {
    $min = $input3;
}

echo $min;
