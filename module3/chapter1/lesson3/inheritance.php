<?php

class Fruit {
    public $name;
    public $color;

    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function intro() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

//$object = new Fruit('apple', 'red');
//$object->intro();

// Strawberry is inherited from Fruit
class Strawberry extends Fruit {
    public function message() {
        echo "Am I a fruit or a berry? ";
    }

    public function intro() {
        echo parent::intro();
    }
}

class Apple extends Fruit {
    public function __construct() {
        parent::__construct('apple', 'blue');
    }

    public function name(): string {
        return $this->name;
    }
}

$apple = new Apple;
//var_dump($apple);
$apple->intro();

/*
$object = new Strawberry('mango', 'yellow');
$object->intro();
*/