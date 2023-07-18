<?php

class Example
{
    public string $attribute;

    public function __constructor(string $name)
    {
        $this->attribute = $name;
    }

    public function __toString(): string
    {
        return "Class Example with parameter";
    }
}

$example = new Example('Hennadii');

echo $example;
