<?php

class ClassWithoutAutoload2
{
    public function __construct(string $name)
    {
        echo $name .PHP_EOL;
    }
}
