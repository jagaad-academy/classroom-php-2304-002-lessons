<?php
/* SOLUTION 1
$input = readline('Enter number beween 0 and 9 as strings (eg: five,nine): ');

$wordsToDigit = [
    'zero' => 0,
    'one' => 1,
    'two' => 2,
    'three' => 3,
    'four' => 4,
    'five' => 5,
    'six' => 6,
    'seven' => 7,
    'eight' => 8,
    'nine' => 9,
];

$words = explode(',', $input);

$newValue = '';

foreach ($words as $word) {
    $newValue .= $wordsToDigit[$word];
}

echo $newValue;
*/

/* SOLUTION 2
$input = readline('Enter number beween 0 and 9 as strings (eg: five,nine): ');

echo wordToDigit($input);

function wordToDigit($wordList) {
    $wordsToDigit = [
        'zero' => 0,
        'one' => 1,
        'two' => 2,
        'three' => 3,
        'four' => 4,
        'five' => 5,
        'six' => 6,
        'seven' => 7,
        'eight' => 8,
        'nine' => 9,
    ];

    $words = explode(',', $wordList);
    $digits = '';

    foreach ($words as $word) {
        $digits .= $wordsToDigit[$word];
    }

    return $digits;
}
*/

/*
$toConvertInput = readline('Enter number beween 0 and 9 as strings (eg: five,nine): ');

$toConvertArray = explode(',', $toConvertInput);

$convertedArray = [];

for ($i=0; $i<count($toConvertArray); $i++) {
    switch ($toConvertArray[$i]) {
        case 'zero':
            array_push($convertedArray, 0);
            break;
        case 'one':
            array_push($convertedArray, 1);
            break;
        case 'two':
            array_push($convertedArray, 2);
            break;
        case 'three':
            array_push($convertedArray, 3);
            break;
        case 'four':
            array_push($convertedArray, 4);
            break;
        case 'five':
            array_push($convertedArray, 5);
            break;
        case 'six':
            array_push($convertedArray, 6);
            break;
        case 'seven':
            array_push($convertedArray, 7);
            break;
        case 'eight':
            array_push($convertedArray, 8);
            break;
        case 'nine':
            array_push($convertedArray, 9);
            break;   
        default:
            echo 'Enter the correct value';
            break;   
    }
}

// print_r($convertedArray);

echo implode('', $convertedArray);
*/

$input = readline('Enter number beween 0 and 9 as strings (eg: five,nine): ');

$wordsToDigit = [
    'zero' => 0,
    'one' => 1,
    'two' => 2,
    'three' => 3,
    'four' => 4,
    'five' => 5,
    'six' => 6,
    'seven' => 7,
    'eight' => 8,
    'nine' => 9,
];

$words = explode(',', $input);

foreach ($words as $word) {
    if (isset($wordsToDigit[$word])) {
        echo $wordsToDigit[$word];
    } else {
        die("\nsorry, I don't know how to handle word: '$word'");
    }
}
