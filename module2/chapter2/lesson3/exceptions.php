<?php

$input = readline('Put a number greater than 10: ');

try {
    check((int)$input);
} catch (Exception $e) {
    $input = readline($e->getMessage());
    check((int)$input);
} finally {
    print "this part is always executed";
}

function check(int $input)
{
    if ($input <= 10) {
        throw new Exception("Your number is lower than 10, please provide another one");
    } else {
        echo "Thank you!";
    }
}
