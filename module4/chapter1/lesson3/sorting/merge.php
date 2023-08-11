<?php
// Merges two subarrays of arr[].
// First subarray is arr[l..m]
// Second subarray is arr[m+1..r]
function merge(&$arr, $l, $m, $r)
{
    $n1 = $m - $l + 1;
    $n2 = $r - $m;

    // Create temp arrays
    $L = array();
    $R = array();

    // Copy data to temp arrays L[] and R[]
    for ($i = 0; $i < $n1; $i++)
        $L[$i] = $arr[$l + $i];
    for ($j = 0; $j < $n2; $j++)
        $R[$j] = $arr[$m + 1 + $j];

    // Merge the temp arrays back into arr[l..r]
    $i = 0;
    $j = 0;
    $k = $l;
    while ($i < $n1 && $j < $n2) {
        if ($L[$i] <= $R[$j]) {
            $arr[$k] = $L[$i];
            $i++;
        } else {
            $arr[$k] = $R[$j];
            $j++;
        }
        $k++;
    }

    // Copy the remaining elements of L[],
    // if there are any
    while ($i < $n1) {
        $arr[$k] = $L[$i];
        $i++;
        $k++;
    }

    // Copy the remaining elements of R[],
    // if there are any
    while ($j < $n2) {
        $arr[$k] = $R[$j];
        $j++;
        $k++;
    }
}

// l is for left index and r is right index of the
// sub-array of arr to be sorted
function mergeSort(&$arr, $l, $r)
{
    if ($l < $r) {
        $m = $l + (int)(($r - $l) / 2);

        // Sort first and second halves
        mergeSort($arr, $l, $m);
        mergeSort($arr, $m + 1, $r);

        merge($arr, $l, $m, $r);
    }
}

// Function to print an array
function printArray($A, $size)
{
    for ($i = 0; $i < $size; $i++)
        echo $A[$i] . " ";
    echo "\n";
}

// Driver code
$arr = array(12, 11, 13, 5, 6, 7);
$arr_size = sizeof($arr);

echo "Given array is \n";
printArray($arr, $arr_size);

mergeSort($arr, 0, $arr_size - 1);

echo "\nSorted array is \n";
printArray($arr, $arr_size);
