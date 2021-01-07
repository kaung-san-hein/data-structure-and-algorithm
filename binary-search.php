<?php
function binarySearch(
    array $numbers,
    int $needle,
    int $low,
    int $high
): bool {
    if ($high < $low) {
        return FALSE;
    }
    $mid = (int) (($low + $high) / 2);
    if ($numbers[$mid] > $needle) {
        return binarySearch($numbers, $needle, $low, $mid - 1);
    } else if ($numbers[$mid] < $needle) {
        return binarySearch($numbers, $needle, $mid + 1, $high);
    } else {
        return TRUE;
    }
}
// function binarySearch(array $numbers, int $needle): bool
// {
//     $low = 0;
//     $high = count($numbers) - 1;
//     while ($low <= $high) {
//         $mid = (int) (($low + $high) / 2);
//         if ($numbers[$mid] > $needle) {
//             $high = $mid - 1;
//         } else if ($numbers[$mid] < $needle) {
//             $low = $mid + 1;
//         } else {
//             return TRUE;
//         }
//     }
//     return FALSE;
// }
$numbers = range(1, 200, 5);
$number = 31;
if (binarySearch($numbers, $number, 0, count($numbers) - 1) !== FALSE) {
    echo "$number Found <br/>";
} else {
    echo "$number Not found <br/>";
}
$number = 500;
if (binarySearch($numbers, $number, 0, count($numbers) - 1) !== FALSE) {
    echo "$number Found <br/>";
} else {
    echo "$number Not found <br/>";
}
