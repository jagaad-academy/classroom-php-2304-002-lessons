<?php

class Car2 {
    final public function turnOff() {
        echo 'turned off';
    }
}

class Audi extends Car2 {
    public function turnOff() {
        echo 'nothing';
    }
}

$car = new Audi;
$car->turnOff();