<?php

interface Animals
{
    public function saySomething(): string;

    public function eat(): void;

    public function sleep(): void;

    public function play(): void;

    public function drink(): void;
}

abstract class Mammal implements Animals
{
    public string $name;

    public int $hungry = 0;

    public int $energy = 10;

    public int $mood = 6;

    public float $weight;

    public function __contruct(string $name)
    {
        $this->name = $name;
    }

    public function drink(): void
    {
        $this->energy++;
    }
}

class Cat extends Mammal
{
    public function saySomething(): string
    {
        echo 'Meow!';
    }

    public function eat(): void
    {
        $this->mood++;
        $this->energy--;
        $this->hungry--;
        $this->saySomething();
    }

    public function sleep(): void
    {
        $this->energy++;
        $this->mood++;
        $this->saySomething();
    }

    public function play(): void
    {
        $this->energy--;
        $this->mood++;
        $this->hungry++;
    }
}

class Dog extends Mammal
{
    public function saySomething(): string
    {
        echo 'Bow!';
    }

    public function eat(): void
    {
        $this->mood++;
        $this->energy++;
        $this->hungry--;
        $this->saySomething();
    }

    public function sleep(): void
    {
        $this->energy++;
        $this->mood--;
        $this->saySomething();
    }

    public function play(): void
    {
        $this->energy++;
        $this->mood++;
        $this->hungry++;
    }
}

class Horse extends Mammal
{
    public function drink(): void
    {
        $this->energy--;
    }

    public function saySomething(): string
    {
        // TODO: Implement saySomething() method.
    }

    public function eat(): void
    {
        // TODO: Implement eat() method.
    }

    public function sleep(): void
    {
        // TODO: Implement sleep() method.
    }

    public function play(): void
    {
        // TODO: Implement play() method.
    }
}
