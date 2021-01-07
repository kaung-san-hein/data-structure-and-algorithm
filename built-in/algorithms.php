<?php
// $baseNumber = "123456754";
// $newNumber = base_convert($baseNumber, 8, 18);
// echo $newNumber;

// $binary = '00110101';
// echo bin2hex($binary);

// $inputStr = 'Aple';
// $fruites = ['Apple', 'Orange', 'Grapes', 'Banana', 'Water melon', 'Mango'];
// $matchScore = -1;
// $matchedStr = '';
// foreach ($fruites as $fruit) {
//     $tmpScore = levenshtein($inputStr, $fruit);
//     if ($tmpScore == 0 || ($matchScore < 0 || $matchScore >
//         $tmpScore)) {
//         $matchScore = $tmpScore;
//         $matchedStr = $fruit;
//     }
// }
// echo $matchScore == 0 ? 'Exact match found : ' . $matchedStr : 'Did you mean: ' . $matchedStr . '?';

$str1 = "Mango";
$str2 = "Tango";
echo "Match length: " . similar_text($str1, $str2) . "<br/>";
similar_text($str1, $str2, $percent);
echo "Percentile match: " . $percent . "%";

$word1 = "Pray";
$word2 = "Prey";
echo $word1 . " = " . soundex($word1) . "\n";
echo $word2 . " = " . soundex($word2) . "\n";
$word3 = "There";
$word4 = "Their";
echo $word3 . " = " . soundex($word3) . "\n";
echo $word4 . " = " . soundex($word4) . "\n";

// same function to get soundex key but metaphone is more accurate

$word1 = "Pray";
$word2 = "Prey";
echo $word1 . " = " . metaphone($word1) . "\n";
echo $word2 . " = " . metaphone($word2) . "\n";
$word3 = "There";
$word4 = "Their";
echo $word3 . " = " . metaphone($word3) . "\n";
echo $word4 . " = " . metaphone($word4) . "\n";


// Hashing