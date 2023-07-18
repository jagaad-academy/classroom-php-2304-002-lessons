<?php
//
//class Shape
//{
//    public function draw()
//    {
//    }
//}
//
//class Circle extends Shape
//{
//    public function draw()
//    {
//        echo "Circle has been drawn.</br>";
//    }
//}
//
//class Triangle extends Shape
//{
//    public function draw()
//    {
//        echo "Triangle has been drawn.</br>";
//    }
//}
//
//$circle = new Circle();
//$circle->draw();
//
//$triangle = new Triangle();
//$triangle->draw();


abstract class Animal
{
    protected string $name;
    abstract public function saySomething();

    abstract public function eat();

    abstract public function sleep();
}

class Cat extends Animal
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function saySomething()
    {
        // TODO: Implement saySomething() method.
    }

    public function eat()
    {
        // TODO: Implement eat() method.
    }

    public function sleep()
    {
        // TODO: Implement sleep() method.
    }
}

class Dog extends Animal
{
    public function __constructor(string $name)
    {
        $this->name = $name;
    }

    public function saySomething()
    {
        echo "Bow!";
    }

    public function eat()
    {
        // TODO: Implement eat() method.
    }

    public function sleep()
    {
        // TODO: Implement sleep() method.
    }
}
