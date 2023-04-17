<?php

class Fruit {
    // code goes here...
}

class Car {
}

$object1 = new Fruit;

$object2 = new Car;

if ($object2 instanceof Car) {
    echo 'object is a car';
} else {
    echo 'object is NOT a car';
}
