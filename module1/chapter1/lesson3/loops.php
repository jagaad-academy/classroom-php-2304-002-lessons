<?php
/*
$i = 1;
while ($i <= 10) {
    echo $i++;
}
*/
//
//$i = 0;
//do {
//    echo $i;
//} while ($i > 1);

//$i = 0;
//while ($i > 1) {
//    echo $i;
//}
//
//$arr = [1, 2, 3, 4];
//for ($i = 0; $i < count($arr); $i++) {
//    echo $i . ":" . $arr[$i] . PHP_EOL;
//}

//Not valid for PHP 8.0
//$arrForeach = 'test';
//$arrForeach[0] => 't'
//$arrForeach[1] => 'e'...

$arrForeach = [0, 1, 2, 3];
foreach ($arrForeach as $key => $value) {
    echo "$key : $value" . PHP_EOL;
}
