<?php
function bucketSort(array &$data)
{
    $n = count($data);
    if ($n <= 0)
        return;
    $min = min($data);  // 20
    $max = max($data);  // 97
    $bucket = [];
    $bLen = $max - $min + 1; // 88
    $bucket = array_fill(0, $bLen, []); // length of $bLen [] arr
    for ($i = 0; $i < $n; $i++) {
        array_push($bucket[$data[$i] - $min], $data[$i]);
    }
    $k = 0;
    for ($i = 0; $i < $bLen; $i++) {
        $bCount = count($bucket[$i]);
        for ($j = 0; $j < $bCount; $j++) {
            $data[$k] = $bucket[$i][$j];
            $k++;
        }
    }
}
$data = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];
bucketSort($data);
echo implode(",", $data); 
// $min = min($data);
// $max = max($data);

// $blen = $max - $min + 1;
// $bucket = array_fill(0, $blen, []);

// for ($i = 0; $i < count($data); $i++) { // 45-20
//     array_push($bucket[$data[$i] - $min], $data[$i]);
// }

// print_r($bucket);
