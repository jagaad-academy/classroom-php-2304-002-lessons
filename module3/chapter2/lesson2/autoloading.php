<?php
//require_once "MyClass1.php";

spl_autoload_register(function ($class_name) {
    if(file_exists($class_name . ".php")){
        include $class_name . '.php';
    } else {
        error_log("File not exists!");
    }
});

$obj  = new MyClass1("message of class 1");
$obj2 = new MyClass2("message of class 2");
$obj3 = new MyClass3("message of class 3");
