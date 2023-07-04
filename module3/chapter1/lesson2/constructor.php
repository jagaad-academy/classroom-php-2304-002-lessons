<?php


class Fruit {

    //Attributes
    public string $name;
    public string $color;

    //Constructor
    public function __construct(string $name, string $color = 'green')
    {
        $this->name = $name;
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

$fruit = new Fruit('Apple', 'yellow');
echo $fruit->getName() . PHP_EOL;
echo $fruit->color;
