<?php

require_once __DIR__ . "/ClassWithoutAutoload1.php";
require_once __DIR__ . "/ClassWithoutAutoload2.php";
require_once __DIR__ . "/../MyClass1.php";

$obj1 = new ClassWithoutAutoload1("class 1 message");
$obj2 = new ClassWithoutAutoload2("class 2 message");

$obj3 = new MyClass1("myclass 1 message");
