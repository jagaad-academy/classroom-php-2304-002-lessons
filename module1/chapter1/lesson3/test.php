<?php

$a = readline("Enter the first number: ");
$b = readline("Enter the second number: ");
$c = readline("Enter the third number: ");

$minValue = $a;

if($minValue > $b){
    $minValue = $b;
}

if($minValue > $c){
    $minValue = $c;
}

echo 'The smallest number is ' . $minValue;