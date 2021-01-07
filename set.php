<?php

$odd = [];
$odd[1] = true;
$odd[3] = true;
$odd[5] = true;
$odd[7] = true;
$odd[9] = true;

$prime = [];
$prime[2] = true;
$prime[3] = true;
$prime[5] = true;
if (isset($prime[2])) {
    echo "2 is a prime";
}
$union = $prime + $odd;
$intersection = array_intersect_key($prime, $odd);
$compliment = array_diff_key($prime, $odd);

// $odd = [];
// $odd[] = 1;
// $odd[] = 3;
// $odd[] = 5;
// $odd[] = 7;
// $odd[] = 9;

// $prime = [];
// $prime[] = 2;
// $prime[] = 3;
// $prime[] = 5;

// if (in_array(2, $prime)) {
//     echo "2 is a prime";
// }

// $union = array_merge($prime, $odd);
// $intersection = array_intersect($prime, $odd); // show same first and second
// $compliment = array_diff($prime, $odd); // not different in first to second

// echo "<br/>";
// print_r($compliment);
