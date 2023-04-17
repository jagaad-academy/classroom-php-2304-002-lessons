<?php

// construct
/*
class Magic1 {
    public function __construct() {
        echo 'method called';
    }
}

$magic1 = new Magic1();
*/


// toString
/*
class Magic2 {
    public function __construct() {
        echo 'construct called' . PHP_EOL;
    }

    public function __toString() {
        return 'method toString called';
    }
}
$magic2 = new Magic2();
$str = (string)$magic2;
echo $str;
*/

// call
/*
class Magic3 {
    public function __call(string $name, array $arguments) {
        var_dump($name, $arguments);
    }
}
$magic3 = new Magic3();
$magic3->xpto('test');
*/


// get & set
/*
class Magic4 {
    private array $dynamicProps = [];

    public function __get(string $name) {
        //return 'nope';
        return $this->dynamicProps[$name] ?? null;
    }

    public function __set(string $name, $value): void {
        //echo 'no set :D';
        $this->dynamicProps[$name] = $value;
    }
}

$magic4 = new Magic4();
$magic4->name = 'Lucas';
$magic4->company = 'Jagaad';
$magic4->year = 2022;
echo $magic4->name;
*/

// invoke
class Magic5 {
    private string $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function __invoke() {
        echo 'Hello, ' . $this->name;
    }
}

$magic5 = new Magic5('Lucas');
$magic5();

/* compared to functional programming
function func1($name) {
    return function () use ($name) {
        echo 'Hello, ' . $name;
    };
}

$func = func1('Lucas');
$func();
*/
