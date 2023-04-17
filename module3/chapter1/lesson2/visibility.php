<?php

class Fruit3 {
  public $name;
  public $color;
  private $weight;

  public function __construct($weight)
  {
    $this->setWeight($weight);
  }

  private function setWeight($weight) {
    $this->weight = $weight . PHP_EOL;
  }

  public function getWeight() {
    return $this->weight;
  }
}

$mango = new Fruit3('100');

//echo $mango->weight;
echo $mango->getWeight();
echo $mango->getWeight();

$mango->name = 'Mango'; // OK
$mango->color = 'Yellow'; // ERROR
//$mango->weight = '300'; // ERROR