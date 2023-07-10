<?php

trait SayGreeting
{
    /* A public property */
    public $info;
    /* A protected property */
    protected $language;
    /* A private property */
    private $name = 'my name';
    /* A static property */
    public static $count = 0;

    /* Abstract methods */
    abstract public function sayHey();

    /* A public method */
    public function sayHello()
    {
        echo 'Hello, I\'m ' . $this->className . PHP_EOL;
    }

    /* A private method */
    private function sayGoodbye()
    {
        echo 'Goodbye!';
    }

    /* A static method */
    public static function printCount()
    {
        echo 'Class count: ' . self::$count;
    }
}

class MyClass
{
    use SayGreeting;

    public string $className = 'class name';

    public function __construct(string $name)
    {
        $this->name = $name;
        self::$count = 0;
    }
    public function sayHey()
    {
        echo 'Hey!';
    }
}
class MyClassAnother
{
    use SayGreeting;

    public string $className = 'class name another';

    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function sayHey()
    {
        echo 'Hey!';
    }
}

$classInstance = new MyClass('test name');
$classInstance->sayHello();
//$classInstance->sayGoodbye(); // Error message

//MyClass::$count = 50;
//MyClass::printCount();

$classInstance = new MyClassAnother('test name another');
$classInstance->sayHello();
