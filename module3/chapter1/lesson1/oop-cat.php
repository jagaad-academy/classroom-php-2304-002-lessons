<?php

class Cat {
    public $mood;
    public $hungry;
    public $energy;

    public function __construct($mood, $hungry, $energy)
    {
        $this->mood = $mood;
        $this->hungry = $hungry;
        $this->energy = $energy;
    }

    function meow() {
        echo 'meow!';
    }

    function feed() {
        $this->hungry--;
        $this->mood++;
        $this->meow();
    }
}

$tom = new Cat(9, 5, 8);

echo 'hungry: ' . $tom->hungry;
echo PHP_EOL;
echo 'mood: ' . $tom->mood;

echo PHP_EOL;

$tom->feed();

echo PHP_EOL;

echo 'hungry: ' . $tom->hungry;
echo PHP_EOL;
echo 'mood: ' . $tom->mood;
