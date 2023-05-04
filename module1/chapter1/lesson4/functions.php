<?php

declare(strict_types=1);

echo "Test git pull!";

function takes_array(array $input)
{
    echo "$input[0] + $input[1] = " . $input[0] + $input[1];
}

$arr = [2, 2];
//takes_array($arr);


// Passing arguments by reference
function add_some_extra(&$string)
{
    $string .= 'and something extra.' . PHP_EOL;
}

$str = 'This is a string, ';
//add_some_extra($str);
//echo $str;

//non reference example
function add_some_extra_non_reference($string)
{
    $string .= 'and something extra.' . PHP_EOL;
    return $string;
}

$str1 = 'This is a string, ';
//$str1 = add_some_extra_non_reference($str1);
//echo $str1;

function sum(...$numbers)
{
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

//echo sum(1, 2, 3, 4, 5, 6 ,7,8 ,9,10);

function makeCoffee($type = "cappuccino")
{
    return "Making a cup of $type.\n";
}

//echo makeCoffee();
//echo makeCoffee(null);
//echo makeCoffee("espresso");

function isUserLoggedIn($userName = false)
{
    if ($userName) {
        //...
    } else {
        //...
    }
    return !empty($userName);
}

//user is not logged in
//isUserLoggedIn();

//user is logged in
//isUserLoggedIn($username);


//function checkUser($userName = '', $userPassword = '', $userSessionId = 0, ...$products)
//{
//
//}


function makeYogurt($container = "bowl", $flavour = "raspberry", $style = "Greek"): string
{
    $container .= " !!! ";
    $number = 32131321;
//    return $number;
    return "Making a $container of $flavour $style yogurt.\n";
}

//echo makeYogurt(style: "natural");

//echo makeYogurt(1,2,3);

$greet = function($name) {
    printf("Hello %s\r\n", $name);
};

//$greet('World');
//$greet('PHP');

$message = 'hello';
$testMessage = ' Start! ';
// No "use"
$example = function ($testMessageParameter) use ($message) {
    $message .= $testMessageParameter . " test";
    echo $message;

};
//$example($testMessage);

$y = 1;
$fn1 = fn($x) => $x + $y;
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

//echo $fn1(3);
//echo $fn2(3);
