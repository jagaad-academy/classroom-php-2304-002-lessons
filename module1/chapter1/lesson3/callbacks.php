<?php

// an example callback function
function myCallbackFunction()
{
    echo 'hello world!';
}

// type 1: simple callback
call_user_func('myCallbackFunction');


function func1()
{
    echo 1;
}

function func2()
{
    echo 2;
}

// callable as argument
function runFunc(callable $func): void
{
    $func();
}

$input = readline("Input number 1 or 2");

if($input == 1){
    func1();
} else {
    func2();
}

call_user_func('func' . $input);
