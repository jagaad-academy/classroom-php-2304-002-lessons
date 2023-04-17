<?php

$fileObject = new SplFileObject('./data.json', 'r');

$json = json_decode($fileObject->fread(100), true);

foreach ($json as $item) {
    echo $item . PHP_EOL;
}

$json[] = 'testN';

$fileObject = new SplFileObject('./data.json', 'w+');
$fileObject->fwrite(json_encode($json));
