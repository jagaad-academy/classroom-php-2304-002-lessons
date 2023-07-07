<?php

//define("NAME", 'Volvo');

class Auto
{
    const NAME = 'Auto';

    public static $name = 'auto static';

    public static function displayName()
    {
        echo self::$name;
        echo self::NAME;
    }
}

//$auto1 = new Auto();
//$auto2 = new Auto();

//echo Auto::NAME . PHP_EOL;
//
//Auto::$name = 'not auto';
//
//echo $auto1::$name . PHP_EOL;
//echo $auto2::$name . PHP_EOL;
//
//$auto1::$name = 'not auto2 object';
//
//echo $auto1::$name . PHP_EOL;
//echo $auto2::$name . PHP_EOL;

Auto::displayName();
