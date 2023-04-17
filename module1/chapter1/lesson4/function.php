<?php

/*
function takes_array(array $input) {
    echo "$input[0] + $input[1] = " . $input[0]+$input[1];
}

takes_array([2, 2]);
echo PHP_EOL;
takes_array([5, 1]);

// output: 2 + 2 = 4
*/

/*
function sayMyName($name, $lastName = 'N/A') {
    // suppose a lot of code here :O
    echo "Your name is $name and your last name is: $lastName\n";
}

sayMyName('Lucas', 'de Oliveira');
sayMyName('Raul');
sayMyName('Aladin');
sayMyName('Samer');
*/

// Passing arguments by reference
/*
function add_some_extra(&$string) {
    $string .= 'and something extra.';
}

$str = 'This is a string, ';
add_some_extra($str);
echo $str;

// output: This is a string, and something extra.
*/

// Default argument values*

function makeCoffee($type = "cappuccino") {
    return "Making a cup of $type.\n";
}

/*
echo makeCoffee();
echo makeCoffee(null);
echo makeCoffee("espresso");
*/

/*
function makeYogurt(
    $container = "bowl", 
    $flavour = "raspberry", 
    $style = "Greek"
) {
    return "Making a $container of $flavour $style yogurt.\n";
}

echo makeYogurt(style: "natural");
*/

/*
$y = 1;
 
$fn1 = fn($x) => $x + $y;
// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_export($fn1(3));
*/