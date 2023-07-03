<?php

class Cat
{
    public int $mood = 5;
    public int $hungry = 0;
    public int $energy = 10;

    public function meow(): void
    {
        echo "MEOW!" . PHP_EOL;
    }

    public function sleep(): void
    {
        $this->energy++;
        $this->hungry++;
        $this->displayCatState();
    }

    public function feed(): void
    {
        $this->hungry--;
        $this->mood++;
        $this->meow();
        $this->displayCatState();
    }

    public function play(): void
    {
        $this->mood++;
        $this->energy--;
        $this->meow();
        $this->displayCatState();
    }

    public function checkTheCat(): void
    {
        if ($this->hungry > 10) {
            echo "Feed the cat!" . PHP_EOL;
            return;
        }

        if ($this->energy < 1) {
            echo "Cat has to sleep!" . PHP_EOL;
            return;
        }

        if ($this->mood < 5) {
            echo "Play with your pet!" . PHP_EOL;
            return;
        }

        echo "Cat is fine!" . PHP_EOL;
    }

    public function displayCatState(): void
    {
        echo "----------" . PHP_EOL;
        echo "Mood: " . $this->mood . PHP_EOL;
        echo "Hungry: " . $this->hungry . PHP_EOL;
        echo "Energy: " . $this->energy . PHP_EOL;
        echo "----------" . PHP_EOL;
    }
}

$cat = new Cat();
$cat->displayCatState();

while (true) {
    $action = readline("Put action (sleep, play, feed, stop): ");
    if ($action == 'stop') {
        break;
    }

    $cat->$action();

    /*
    $cat->sleep();
    */

    /*
    $action = 'sleep';
    $cat->$action();
    */
}

$cat->checkTheCat();
