<?php

class Fruit {
    public string $name;

    //Error !!!
//    $this->name = 'Orange';

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

class Car {
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

$apple = new Fruit('Apple');
$apple = new Car('Volvo');

if($apple instanceof Fruit){
    echo 'This is a fruit object';
} else {
    echo 'This is NOT a fruit object';
}
