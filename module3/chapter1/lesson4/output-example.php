<?php

interface Output {
    public function print($message);
    public function printList(array $messages);
}

interface CalculatorInput {
    public function getInput($message = null): float;
}

class CliInput implements CalculatorInput {
    public function getInput($message = null): float {
        return (float)readline($message);
    }
}

class FsInput implements CalculatorInput {
    public function getInput($message = null): float {
        $input = 1; //get from some external file;
        return $input;
    }
}

class CliOutput implements Output {
    public function print($message) {
        echo $message . PHP_EOL;
    }

    public function printList(array $messages) {
        echo PHP_EOL . '-------------------' . PHP_EOL;
        echo implode(PHP_EOL, $messages);
        echo PHP_EOL . '-------------------' . PHP_EOL;
    }
}

class HtmlOutput implements Output {
    public function print($message) {
        echo "$message<br>";
    }

    public function printList(array $messages) {
        echo '<br>-------------------<br>';
        echo implode('<br>', $messages);
        echo '<br>-------------------<br>';
    }
}

class Calculator {
    //private CalculatorInput $input;
    private Output $output;
    private array $history;

    public function __construct(/*CalculatorInput $input,*/ Output $output) {
        //$this->input = $input;
        $this->output = $output;
    }

    public function sum($num1, $num2) {
        $sum = $num1 + $num2;
        $this->output->print("The $num1 + $num2 result is $sum");
        $this->history[] = "$num1 + $num2 = $sum";
    }

    /*
    public function sum() {
        $num1 = $this->input->getInput('Input 1: ');
        $num2 = $this->input->getInput('Input 2: ');

        $sum = $num1 + $num2;

        $this->output->print("The $num1 + $num2 result is $sum");
        $this->history[] = "$num1 + $num2 = $sum";
    }
    */

    public function showHistory() {
        $this->output->printList($this->history);
    }
}

$calc = new Calculator(new CliOutput);

$calc->sum(1, 3);
$calc->sum(4, 6);
$calc->sum(7, 8);

$calc->showHistory();
