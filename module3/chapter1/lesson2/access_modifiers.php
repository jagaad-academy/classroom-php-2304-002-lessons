<?php

class Fruit {

    public string $name;

    //Read only
    protected string $color;

    //Write only
    private string $size;

    public function __construct(string $name, string $color, string $size)
    {
        $this->name = $name;
        $this->color = $color;
        $this->size = $size;
    }

    public function displayFruitNameAndSize(): void
    {
        echo $this->name . " " . $this->size . PHP_EOL;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    protected function displayFruitNameAndColor(): void
    {
        echo $this->name . " " . $this->color . PHP_EOL;
    }

    private function displayFruitSizeAndColor(): void
    {
        echo $this->size . " " . $this->color . PHP_EOL;
    }

}

$orange = new Fruit('Orange', 'green', 'small');
echo $orange->getColor() . PHP_EOL;
$orange->setSize('huge');

var_dump($orange);
die;

/*
echo $orange->name . PHP_EOL; // OK
echo $orange->color . PHP_EOL; // ERROR
echo $orange->size . PHP_EOL; // ERROR
*/

/*
echo $orange->displayFruitNameAndSize(); // OK
echo $orange->displayFruitNameAndColor(); // ERROR
echo $orange->displayFruitSizeAndColor(); // ERROR
*/
