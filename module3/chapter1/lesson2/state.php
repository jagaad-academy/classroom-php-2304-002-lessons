<?php

/*
class Fruit2 {
  public $name;
  
  function setName($name) {
    $this->name = $name;
  }
}

$apple = new Fruit2;
$apple->setName("Apple");
$apple->setName("Mango");
echo $apple->name;
*/

class Fruit2 {
  public $name;
}

$apple = new Fruit2;
$apple->name = "Apple";
$apple->name = "Mango";

echo $apple->name;

