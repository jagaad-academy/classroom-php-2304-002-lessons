<?php

interface Output
{
    public function print($message);

    public function printList(array $messages);
}

class CliOutput implements Output
{
    public function print($message)
    {
        echo $message . PHP_EOL;
    }

    public function printList(array $messages)
    {
        echo PHP_EOL . '-------------------' . PHP_EOL;
        echo implode(PHP_EOL, $messages);
        echo PHP_EOL . '-------------------' . PHP_EOL;
    }
}

class HtmlOutput implements Output
{
    public function print($message)
    {
        echo "$message<br>";
    }

    public function printList(array $messages)
    {
        echo '<br>-------------------<br>';
        echo implode('<br>', $messages);
        echo '<br>-------------------<br>';
    }
}

class Calculator
{
    private Output $output;
    private array $history;

    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function sum($num1, $num2)
    {
        $sum = $num1 + $num2;
        $this->output->print("The $num1 + $num2 result is $sum");
        $this->history[] = "$num1 + $num2 = $sum";
    }

    public function showHistory()
    {
        $this->output->printList($this->history);
    }
}

$outputSelection = readline('Would you like to work in cli? Yes/No');

if (strtolower($outputSelection) == 'yes') {
    $outputObject = new CliOutput();
} else {
    $outputObject = new HtmlOutput();
}

$calculator = new Calculator($outputObject);

while (true) {
    $readline1 = readline("Put number 1: ");
    $readline2 = readline("Put number 2: ");

    if ($readline1 == 'stop') {
        break;
    }
    $calculator->sum($readline1, $readline2);
    $calculator->showHistory();

}
