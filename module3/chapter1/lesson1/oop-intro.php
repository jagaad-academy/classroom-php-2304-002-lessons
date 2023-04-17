<?php

class Company
{
    // property declaration containing a default value
    public $year = 2020;
   
    // property initiated by the constructor
    private $name;

    // constructor
    public function __construct($name)
    {
        // assign $name argument to the property
        $this->name = $name;
    }

    // method declaration
    public function displayName() {
        echo $this->name . PHP_EOL;
    }
}

// create object setting the constructor value
$jagaad = new Company('Jagaad');
$google = new Company('Google');

// call method
$jagaad->displayName();

// access public property
echo $jagaad->year;

echo PHP_EOL . '------------' . PHP_EOL;

$google->displayName();
echo $google->year;
