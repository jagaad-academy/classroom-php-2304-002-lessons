<?php

class Fruit {
  // Properties/Attributes
  public ?string $name = null;
  public ?string $color = null;

  // Methods
  function setName(string $name) {
    $this->name = $name;
  }
  function getName(): string {
    return $this->name . PHP_EOL;
  }
}

$object = new Fruit;
$object2 = new Fruit;

//var_dump($object);

$object2->setName('orange');

$object = clone $object2;

$object2->setName('apple');

echo $object->getName();

//$object->setName('apple');

//var_dump($object);

/*
echo $object->getName();
echo $object2->getName();

$object->setName('banana');
echo $object->getName();
echo $object->getName();
*/

//var_dump($object, $object2);
