<?php

interface Engine {
    public function startEngine();
}

class SubaruEngine implements Engine {
    public function startEngine() {
        echo 'This is the subaru engine';
    }
}

class VolvoEngine implements Engine {
    public function startEngine() {
        echo 'This is the volvo engine';
    }
}

class Car {
    private Engine $engine;

    public function __construct(Engine $engine) {
        $this->engine = $engine;
    }

    public function startEngine() {
        $this->engine->startEngine();
    }
}

$subaru = new Car(new SubaruEngine);
$subaru->startEngine();

echo PHP_EOL;

$volvo = new Car(new VolvoEngine);
$volvo->startEngine();
