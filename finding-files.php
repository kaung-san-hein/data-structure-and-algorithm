<?php
function showFiles(string $dirName)
{
    $files = scandir($dirName); // when you give a directory path, return array of file name in that directory
    foreach ($files as $value) {
        $path = realpath($dirName . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            echo  $path . "<br/>";
        } else if ($value != "." && $value != "..") {
            showFiles($path);
        }
    }
}

showFiles('E:\xampp\htdocs\test');


// $files = scandir('E:\xampp\htdocs\test');

// // print_r($files);

// // // echo "<br/>";

// foreach ($files as $value) {
//     echo $value . "<br/>";
//     $path = realpath('E:\xampp\htdocs\test' . DIRECTORY_SEPARATOR . $value);
//     echo $path . "<br/><br/>";
// }
