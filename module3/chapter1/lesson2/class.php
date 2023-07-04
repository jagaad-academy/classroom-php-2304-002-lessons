<?php

class Fruit
{
    //Attributes
    public string $name;
    public string $color;

    public bool $freeze = false;

    //Method
    function printName() {
        echo $this->name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        if ($this->freeze) {
            return '';
        } else {
            return $this->name;
        }
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        if(!str_contains($color, '#')){
            $color = "#" . $color;
        }
        $this->color = $color;
    }
}

//    #fffff0

$fruit = new Fruit;
$fruit->name = 'Orange';


if($somethingTrue){
    $fruit->freeze = true;
}
//.......
$name = $fruit->getName();

$fruit->name = $formerName;


//$fruit->freeze = true;
echo $fruit->getName();
