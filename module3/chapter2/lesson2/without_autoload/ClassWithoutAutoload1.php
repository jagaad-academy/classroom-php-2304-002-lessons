<?php

class ClassWithoutAutoload1
{
    public function __construct(string $name)
    {
        echo $name .PHP_EOL;
    }
}
