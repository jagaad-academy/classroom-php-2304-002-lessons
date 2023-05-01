<?php
/**
 * @param $length
 * @return array
 */
function generateRandomArray($length): array
{
    $array = array();
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand(1, 100);
    }
    return $array;
}

/**
 * @param $array
 * @return mixed
 */
function bubbleSort($array)
{
    $length = count($array) - 1;
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $tmp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $tmp;
            }
        }
    }
    return $array;
}

$length = readline("Enter the number of elements to generate: ");
$array = generateRandomArray($length);
echo "Unsorted Array:\n";
print_r($array);

$sortedArray = bubbleSort($array);

echo "\nSorted Array:\n";
print_r($sortedArray);
