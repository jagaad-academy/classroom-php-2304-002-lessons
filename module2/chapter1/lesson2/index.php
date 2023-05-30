<?php
//
//$array = array(
//    1    => "a", //1 => "a"
//    "1"  => "b", //1 => "b"
//    1.5  => "c", //1 => "c"
//    true => "d", //1 => "d"
//);
//
//$intVariable = 1;
//$floatVariable = 1.5;
//$stringVariable = "1";
//$booleanVariable = true;
//
//var_dump($intVariable);
//var_dump((int)$floatVariable);
//var_dump((int)$stringVariable);
//var_dump((int)$booleanVariable);

//$array = [
//    'user1',
//    'user2',
//    'user3',
//    'user4',
//];
//
//$array = [
//    "foo" => "bar",
//    42    => 24,
//    "multi" => [
//        "dimensional" => [
//            "array" => [
//                "user1",
//                "user2",
//            ]
//        ]
//    ]
//];
//
//var_dump($array["foo"]);
//var_dump($array[42]);
//var_dump($array["multi"]["dimensional"]["array"][1]);


function getClasses(int $classIdentifier = 0)
{
    if($classIdentifier == 1){
        return [
            'Math',
            'Chemistry',
            'History'
        ];
    } else {
        return [
            'Math'
        ];
    }
}

//$resultOfFunction = getArray();
if(isset(getClasses()[1])){
    $secondElement = getClasses()[1];
} else {
    $secondElement = 'not defined';
}

var_dump($secondElement);
