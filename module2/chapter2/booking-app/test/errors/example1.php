<?php

/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/

// fake input
$input = '23';

try {
    if (! is_string($input)) {
        throw new Exception("Invalid input string '$input'");
    }

    if ($input === '1') {
        throw new Exception("Invalid input. It must not be '1'");
    }

    echo 'Yes, it is a string, and not 1. :)';
} catch (\Exception $exception) {
    echo $exception->getMessage();
}


/*
try {
    $list = ['red', 'blue'];

    //var_dumb($list);

    $string = json_encode($list);

    $invalidJson = '[]@asdasd';

    var_dump(json_decode($invalidJson, true, 512, JSON_THROW_ON_ERROR));
    echo 'some code';
} catch (\Exception $exception) {
    echo 'Oops! An exception happened. Please, try again later.';

    $errorLog = date('Y-m-d H:i:s') . ': Exception on decoding JSON - ' . $exception->getMessage() . PHP_EOL;
    file_put_contents('error.log', $errorLog, FILE_APPEND);
} catch (\Throwable $error) {
    echo 'Oops! something went wrong. Please, try again later.';

    $errorLog = date('Y-m-d H:i:s') . ': Error on decoding JSON - ' . $error->getMessage() . PHP_EOL;
    file_put_contents('error.log', $errorLog, FILE_APPEND);
}
*/

//echo 'my code is okay, nobody see the error :)';
