<?php

class Person
{
    private string $name;

    private int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}

class Airplane
{
    private Person $pilot;

    public function __construct(Person $pilot)
    {
        $this->pilot = $pilot;
    }

    public function pilotName(): string
    {
        return $this->pilot->getName();
    }

    public function pilotAge(): string
    {
        return $this->pilot->getAge();
    }
}

$person = new Person('Hennadii', 40);
$airplane1 = new Airplane($person);
echo $airplane1->pilotName() . PHP_EOL;

$airplane2 = new Airplane(new Person('Alexander', 55));
echo $airplane2->pilotName() . PHP_EOL;
