<?php

/*
$yesterday = new DateTime();

echo $yesterday->format('Y/m/d');
*/

$timestamp = strtotime("next monday");

echo date('m/d/Y', $timestamp) . PHP_EOL;
