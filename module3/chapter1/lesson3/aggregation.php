<?php

class Employee
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function name()
    {
        return $this->name;
    }
}

class Departament
{
    private array $employees = [];

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function employees(): array
    {
        return $this->employees;
    }
}

$employee1 = new Employee('Hennadii');
$employee2 = new Employee('Victoria');
$employee3 = new Employee('Tosin');

$department = new Departament;
$department->addEmployee($employee3);
$department->addEmployee($employee1);
$department->addEmployee($employee2);


foreach ($department->employees() as $employee){
    echo $employee->name() . PHP_EOL;
}
