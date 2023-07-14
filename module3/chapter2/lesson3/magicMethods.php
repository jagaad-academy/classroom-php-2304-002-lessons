<?php

class Magic
{

    public $name = 'Name default';

    public function __isset($name)
    {
        echo "Property $name is protected or private" . PHP_EOL;
    }

    public function __call($name, $args)
    {
        if (!method_exists($this, $name)) {
            echo "NO method found! " . $name . PHP_EOL;
        } else {
            echo "Method found! " . $name . PHP_EOL;
        }
    }

    public static function __callStatic($name, $args)
    {
        echo "NO static method found! " . $name . PHP_EOL;
    }

    public function stop()
    {
        echo "Stopped!";
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function __invoke($data)
    {
        var_dump($data);
    }

    public function __clone()
    {
        echo "We are in __clone" . PHP_EOL;
    }
}

$magic = new Magic();
//$magic->run();
//$magic::walk();
//$magic->stop();

//
//if(!isset($magic->name) && empty($magic->name)){
//    echo "Magic method __isset";
//}
//
//$serialized = serialize($magic);
//var_dump($serialized);
//
//$unserialized = unserialize($serialized);
//var_dump($unserialized);

//$magic('__invoke Test!');

$magic1 = clone $magic;

$magic->name = "test of clone!";

echo $magic->name;
echo $magic1->name;
