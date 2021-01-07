<?php
$dsn = "mysql:host=localhost;dbname=data-db";
$username = "root";
$password = "";
$dbh = new PDO($dsn, $username, $password);
$query = $dbh->prepare("Select * from categories order by parentCategory asc, sortId asc");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);
$categories = [];
foreach ($result as $row) {
    $categories[$row->parentCategory][] = $row; // save array with parentCategory
}

function showCategoryTree(array $categories, int $n)
{
    if (isset($categories[$n])) {
        foreach ($categories[$n] as $category) {
            echo $n . "<br/>";  // this is parentCategory == [] index
            echo str_repeat("-", $n) . "" . $category->categoryName . "<br/>";
            echo "<br/>";
            showCategoryTree($categories, $category->id);
        }
    }
    return;
}

showCategoryTree($categories, 0);

// class obj
// {
// }

// $arr = [];
// $arr[0][] = new obj();
// $arr[1][] = new obj();
// $arr[1][] = new obj();
// $arr[1][] = new obj();
// $arr[2][] = new obj();

// foreach ($arr as $key => $value) {
//     print_r($value);
//     echo "<br/>";
// }
