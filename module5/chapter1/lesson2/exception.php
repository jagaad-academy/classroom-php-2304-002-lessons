<?php
/**
 * exception.php
 * hennadii.shvedko
 * 12.09.2023
 */

$value = 1;
$divider = 0;

try {
    if($divider == 0) {
        throw new RuntimeException("Trying to divide by 0");
    }
} catch (RuntimeException $exception){
    echo $exception->getMessage();
}
