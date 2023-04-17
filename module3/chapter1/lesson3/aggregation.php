<?php

class Employee {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function name() {
        return $this->name;
    }
}

class Departament {
    private string $name;
    private array $employees = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function employees(): array {
        return $this->employees;
    }

    public function getName(): string {
        return $this->name;
    }
}

$lucas = new Employee('lucas');
$raul = new Employee('raul');
$aladin = new Employee('aladin');
$hammed = new Employee('hammed');

//echo $lucas->name();

$dep = new Departament('IT');
$dep->addEmployee($lucas);
$dep->addEmployee($raul);
$dep->addEmployee($aladin);
$dep->addEmployee($hammed);

echo $dep->getName() . PHP_EOL;
//var_dump($dep->employees());

foreach ($dep->employees() as $employee) {
    echo $employee->name() . PHP_EOL;
}
