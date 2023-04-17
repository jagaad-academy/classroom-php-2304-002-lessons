<?php

class Person {
    private string $name;
    private string $lastName;

    public function __construct(string $name, string $lastName) {
        $this->name = $name;
        $this->lastName = $lastName;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): Person {
//        $this->name = $name;
//        return $this;
        return new Person($name, $this->lastName);
    }

    public function getLastName(): string {
        return $this->lastName;
    }
}

// variable by reference
/*
$a = 1;
$b =& $a;
$b = 2;

echo $a; // 1
echo PHP_EOL;
echo $b; // 2
*/

// immutable object example
$person = new Person('Lucas', 'de Oliveira');
$person2 = $person->setName('test'); // it returns a new person

echo $person2->getName(); // test
echo PHP_EOL;
echo $person->getName(); // Lucas
