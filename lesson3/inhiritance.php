<?php


// Plant -> Fruit -> Strawberry -> ....


class Plant
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function displayName()
    {
        echo $this->name . PHP_EOL;
    }
}

class Fruit extends Plant
{
    public $name;
    public $color;

    public function __construct($name, $color)
    {
        parent::__construct($name);

        $this->name = $name;
        $this->color = $color;
    }

    public function intro()
    {
        echo "The fruit is {$this->name} and the color is {$this->color}." . PHP_EOL;
    }

}

// Strawberry is inherited from Fruit
class Strawberry extends Fruit
{
    public function message()
    {
        echo "Am I a fruit or a berry? " . PHP_EOL;
    }
}

$fruit = new Fruit('Orange', 'green');
$fruit->intro();

$strawberry = new Strawberry('Strawberry', 'red');
$strawberry->message();
$strawberry->intro();
