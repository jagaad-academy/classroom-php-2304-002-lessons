<?php

/*
Write an algorithm to display the first N natural numbers in reverse order.

Example:
Input:
9
Output:
9 8 7 6 5 4 3 2 1
*/

$input = readline("Enter an integer: ");

while ($input > 0) {
    echo $input;
    //echo PHP_EOL; // "\n"
    echo "<br>";
    $input--;
    // $input = $input - 1;
    // $input -= 1;
}

/*
for ($input = readline("Enter an integer: "); $input > 0; $input--) {
    echo $input;
}
*/

