<?php

abstract class Car
{
    public string $name;
    protected bool $engineOn = false;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function printName(): void;

    abstract public function changeName(string $newName): void;

    abstract protected function priceForName(string $name, int $number): float;

    public function startEngine(): void
    {
        $this->engineOn = true;
    }
    public function stopEngine(): void
    {
        $this->engineOn = false;
    }
}

class Volvo extends Car
{
    protected function priceForName(string $name, int $number, float $startPrice = 0, float $endPrice = 0): float
    {
        return 1.5;
    }

    public function printName(): void
    {
        echo $this->name . PHP_EOL;
    }

    public function changeName(string $newName): void
    {
        $this->name = $newName;
    }

    final public function intro(): string
    {
        return "Proud to be Swedish! I'm a $this->name!";
    }
}

class VolvoModel1 extends Volvo
{
    //ERROR!
    public function intro(): string
    {
        return "Proud to be Swedish! I'm a $this->name!";
    }
}

class BMW extends Car
{
    protected function priceForName(string $name, int $number, float $startPrice = 0, float $endPrice = 0): float
    {
        return 2.5;
    }

    public function printName(): void
    {
        echo $this->name . '!';
    }

    public function changeName(string $newName): void
    {
        $this->name = $newName;
    }

}

final class Audi extends Car
{
    protected function priceForName(string $name, int $number, float $startPrice = 0, float $endPrice = 0): float
    {
        return 2.5;
    }

    public function printName(): void
    {
        echo $this->name . '!';
    }

    public function changeName(string $newName): void
    {
        $this->name = $newName;
    }
}

//ERROR!
class AudiModel1 extends Audi
{

}


$volvo = new Volvo('car volvo');
$bmw = new BMW('car bmw');

$volvo->printName();
$bmw->printName();
