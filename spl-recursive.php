<?php

// $path = realpath('E:\xampp\htdocs\test');
// $files = new RecursiveIteratorIterator(
//     new RecursiveDirectoryIterator($path),
//     RecursiveIteratorIterator::SELF_FIRST
// );
// foreach ($files as $name => $file) {
//     echo "$name<br/>";
// }

// $teams = array(
//     'Popular Football Teams',
//     array(
//         'La Lega',
//         array('Real Madrid', 'FC Barcelona', 'Athletico Madrid', 'RealBetis', 'Osasuna'),
//     ),
//     array(
//         'English Premier League',
//         array('Manchester United', 'Liverpool', 'Manchester City', 'Arsenal', 'Chelsea'),
//     ),
// );
// $tree = new RecursiveTreeIterator(
//     new RecursiveArrayIterator($teams),
//     null,
//     null,
//     RecursiveIteratorIterator::SELF_FIRST
// );
// foreach ($tree as $leaf)
//     echo $leaf . PHP_EOL . "<br/>";

function array_sum_recursive(array $array)
{
    $sum = 0;
    array_walk_recursive($array, function ($v) use (&$sum) {
        $sum += $v;
    });
    return $sum;
}
$arr =
    [1, 2, 3, 4, 5, [6, 7, [8, 9, 10, [11, 12, 13, [14, 15, 16]]]]];
echo array_sum_recursive($arr);
