<?php

$input = readline('input an interger: ');

if ($input <= 0) {
    die('please insert a number greater than zero :D');
}

if (isEven($input)) {
    echo "$input is even";
} else {
    echo "$input is odd";
}

/*
$remainder = $input % 2;

if ($remainder === 0) {
    echo "$input is even";
} else {
    echo "$input is odd";
}
*/

function isEven($input) {
    return ($input % 2) === 0;
}

// recursion
