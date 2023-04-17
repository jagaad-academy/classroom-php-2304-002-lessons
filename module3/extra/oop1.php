<?php

/*
Create a class named "Average" that prints the average 
of three numbers entered by the user. It should have a 
method to calculate and print the result.
*/
/*
class Average {
    public float $num1;
    public float $num2;
    public float $num3;
    public int $average = 3;

    public function __construct(float $num1, float $num2, float $num3) {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->num3 = $num3;
    }

    public function calculate(): void {
        echo ($this->num1 + $this->num2 + $this->num3) / $this->average;
    }
}

$average = new Average(9, 8, 4);
$average->calculate();
echo PHP_EOL;

$average->num1 = 20;
$average->num2 = 5;
$average->num3 = 5;

$average->calculate();
*/

/*
class Average {
    private float $average;

    public function __construct(float $num1, float $num2, float $num3) {
        $this->average = ($num1 + $num2 + $num3) / 3;
    }

    public function calculate(): void {
        echo $this->average . PHP_EOL;
    }
}

$average = new Average(9, 8, 4);
$average->calculate();
$average->calculate();
$average->calculate();
$average->calculate();
$average->calculate();

$average2 = new Average(20, 5, 4);
$average2->calculate();
*/


class Average {
    public static function calculate(float $num1, float $num2, float $num3): void {
        $average = ($num1 + $num2 + $num3) / 3;
        echo $average . PHP_EOL;
    }
}

Average::calculate(9, 8, 4);
Average::calculate(20, 5, 5);
