<?php

$now = new DateTime();

$yesterday = new DateTime('yesterday');

$twoDaysLater = new DateTime('+ 7 days');

$oneWeekEarly = new DateTime('- 1 week');

var_dump($now->format('Y/m/d s:i:H w z'));

var_dump($now->format('d D F Y H:i:s:v'));

echo "Today is " . date("Y/m/d") . PHP_EOL;
echo "Today is " . date("Y.m.d") . PHP_EOL;
echo "Today is " . date("Y-m-d") . PHP_EOL;
echo "Today is " . date("l");
