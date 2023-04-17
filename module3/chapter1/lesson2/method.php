<?php

class Fruit {

  // Method
  function printName() {
    echo 'Apple';
  }

  function printColor($color) {
    echo $color;
  }
}

$object = new Fruit;
$object2 = new Fruit;

//$object->printName();
$object->printColor('blue');

//echo PHP_EOL;

//$object2->printName();

//var_dump($object);
