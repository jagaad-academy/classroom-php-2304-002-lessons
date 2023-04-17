<?php

class Fruit {

  public string $name;
  public string $color;

  function __construct(string $name) {
    $this->name = $name;
    $this->color = 'transparent';
  }

  function getName(): string {
    return $this->name . PHP_EOL;
  }

  function setColor(string $color) {
    $this->color = $color;
  }

  function getColor(): string {
    return $this->color . PHP_EOL;
  }
}

$apple = new Fruit('apple');
$mango = new Fruit('green');

echo $apple->getName();
echo $apple->getColor();

$apple->setColor('blue');

echo $apple->getColor();

echo PHP_EOL . '--------------------' . PHP_EOL;

echo $mango->getName();
echo $mango->getColor();

$mango->setColor('gray');

echo $mango->getColor();