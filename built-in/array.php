<?php
$countries = ['Yangon', 'Nay Pyi Taw'];
array_push($countries, 'Bangladesh', 'Bhutan');

// echo current($countries);  // move internal pointer
// echo "<br/>";
// echo end($countries);
// echo "<br/>";
// echo current($countries);
// echo "<br/>";

// $key = array_search("Yangon", $countries);
// if ($key !== FALSE)
//     echo "Found in: " . $key;
// else
//     echo "Not found";

// $countries = ["bangladesh", "nepal", "bhutan"];
// $newCountries = array_map(function ($country) {
//     return strtoupper($country);
// }, $countries);
// foreach ($newCountries as $country)
//     echo $country . "\n";

// $countries = ["bangladesh", "nepal", "bhutan"];
// $newCountries = array_map('strtoupper', $countries);
// foreach ($newCountries as $country)
//     echo $country . "\n";

$top = array_shift($countries);
echo $top;
