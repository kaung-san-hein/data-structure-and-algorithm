<?php

function insertionSort(array &$arr) // reference parameter so don't have return and this is not copy , do modify
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $key = $arr[$i];   // 67
        $j = $i - 1; // 2
        while ($j >= 0 && $arr[$j] > $key) { // 1 >= 0 && 45 > 67
            $arr[$j + 1] = $arr[$j]; //arr[3] = 93
            $j--;
        }
        $arr[$j + 1] = $key; // arr[2] = 67
    }
}
$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
insertionSort($arr);
echo implode(",", $arr);
