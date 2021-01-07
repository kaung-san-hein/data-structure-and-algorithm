<?php

$array = [1 => 10, 2 => 100, 3 => 1000, 4 => 10000];
$splArray = SplFixedArray::fromArray($array, false);
print_r($splArray);

// $items = 100000;
// $startMemory = memory_get_usage();
// $array = new SplFixedArray($items);
// for ($i = 0; $i < $items; $i++) {
//     $array[$i] = $i;
// }
// $endMemory = memory_get_usage();
// $memoryConsumed = ($endMemory - $startMemory) / (1024 * 1024);
// $memoryConsumed = ceil($memoryConsumed);
// echo "memory = {$memoryConsumed} MB\n";

// $startMemory = memory_get_usage();
// $array = range(1, 100000);
// $endMemory = memory_get_usage();

// $memoryConsumed = ($endMemory - $startMemory) / (1024 * 1024);
// $memoryConsumed = ceil($memoryConsumed);
// echo "memory = {$memoryConsumed} MB\n";

// $array = new SplFixedArray(10);

// for ($i = 0; $i < 10; $i++) {
//     $array[$i] = $i;
// }

// for ($i = 0; $i < 10; $i++) {
//     echo $array[$i] . "<br/>";
// }


// $graph = [];
// $nodes = ['A', 'B', 'C', 'D', 'E'];
// foreach ($nodes as $xNode) {
//     foreach ($nodes as $yNode) {
//         $graph[$xNode][$yNode] = 0;
//     }
// }

// $graph["A"]["B"] = 1;
// $graph["B"]["A"] = 1;
// $graph["A"]["C"] = 1;
// $graph["C"]["A"] = 1;
// $graph["A"]["E"] = 1;
// $graph["E"]["A"] = 1;
// $graph["B"]["E"] = 1;
// $graph["E"]["B"] = 1;
// $graph["B"]["D"] = 1;
// $graph["D"]["B"] = 1;

// foreach ($nodes as $xNode) {
//     foreach ($nodes as $yNode) {
//         echo $graph[$xNode][$yNode] . "\t";
//     }
//     echo "<br/>";
// }


// $players = [];
// $players[] = ["Name" => "Ronaldo", "Age" => 31, "Country" => "Portugal", "Team" => "Real Madrid"];
// $players[] = ["Name" => "Messi", "Age" => 27, "Country" => "Argentina", "Team" => "Barcelona"];
// $players[] = ["Name" => "Neymar", "Age" => 24, "Country" => "Brazil", "Team" => "Barcelona"];
// $players[] = ["Name" => "Rooney", "Age" => 30, "Country" => "England", "Team" => "Man United"];
// foreach ($players as $index => $playerInfo) {
//     echo "Info of player # " . ($index + 1) . "<br/>";
//     foreach ($playerInfo as $key => $value) {
//         echo $key . ": " . $value . "<br/>";
//     }
//     echo "<br/>";
// }

// $studentInfo = [];
// $studentInfo['Name'] = "Adiyan";
// $studentInfo['Age'] = 11;
// $studentInfo['Class'] = 6;
// $studentInfo['RollNumber'] = 71;
// $studentInfo['Contact'] = "info@adiyan.com";
// foreach ($studentInfo as $key => $value) {
//     echo $key . ": " . $value . "<br/>";
// }

// $array = [10, 20, 30, 40, 50];

// $array[] = 60;
// $array[] = 70;

// $arraySize = count($array);
// for ($i = 0; $i < $arraySize; $i++) {
//     echo "Position " . $i . " holds the value " . $array[$i] . "<br/>";
// }

// $array = [];
// $array[10] = 100;
// $array[21] = 200;
// $array[29] = 300;
// $array[500] = 1000;
// $array[1001] = 10000;
// $array[71] = 1971;
// foreach ($array as $index => $value) {
//     echo "Position " . $index . " holds the value " . $value . "<br/>";
// }
