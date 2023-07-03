<?php

//Class definition
class UserClass
{
    //Start properties
    public string $userName;
    public string $password;
    //End of properties


    //Constructor
    public function __construct(string $userName = '', string $password = '')
    {
        $this->userName = $userName;
        $this->password = $password;
    }

    //Behaviour (methods)
    public function displayUserName(): void
    {
        echo $this->userName . PHP_EOL;
    }

    public function displayPassword(): void
    {
        echo $this->password . PHP_EOL;
    }

    public function concatenateUserNameAndPassword(): void
    {
        echo "Username: " . $this->userName .PHP_EOL. "Password: " . $this->password . PHP_EOL . PHP_EOL;
    }
}

//Instantiation of class without parameters
$testClassLesson1Object1 = new UserClass('Alexander Vincent', '100');
$testClassLesson1Object1->concatenateUserNameAndPassword();

//Instantiation of class with parameters
$testClassLesson1Object2 = new UserClass('Hennadii Shvedko', '123');
$testClassLesson1Object2->concatenateUserNameAndPassword();

die;
