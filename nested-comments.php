<?php
$dsn = "mysql:host=localhost;dbname=data-db";
$username = "root";
$password = "";
$dbh = new PDO($dsn, $username, $password);
$query = $dbh->prepare("Select * from comments where postId=:postId order by parentId asc, datetime asc");
$query->execute(array(':postId' => 1));
$result = $query->fetchAll(PDO::FETCH_OBJ);
$comments = [];
foreach ($result as $row) {
    $comments[$row->parentId][] = $row; // save array with parentId 
    // custom id 
}

print_r($comments);

// function displayComments(array $comments, int $n)
// {
//     if (isset($comments[$n])) {
//         $str = "<ul>";
//         foreach ($comments[$n] as $comment) {
//             $str .= "<li><div class='comment'><span class='pic'>{$comment->username}</span>";
//             $str .= "<span class='datetime'>{$comment->datetime}</span>";
//             $str .= "<span class='commenttext'>" . $comment->comments . "</span></div>";
//             $str .= displayComments($comments, $comment->id);
//             $str .= "</li>";
//         }
//         $str .= "</ul>";
//         return $str;
//     }
//     return "";
// }

// echo displayComments($comments, 0);
// 
?>
<!-- // <style>
//     ul {
//         list-style: none;
//         clear: both;
//     }

//     li ul {
//         margin: 0px 0px 0px 50px;
//     }

//     .pic {
//         display: block;
//         width: 50px;
//         height: 50px;
//         float: left;
//         color: #000;
//         background: #ADDFEE;
//         padding: 15px 10px;
//         text-align: center;
//         margin-right: 20px;
//     }

//     .comment {
//         float: left;
//         clear: both;
//         margin: 20px;
//         width: 500px;
//     }

//     .datetime {
//         clear: right;
//         width: 400px;
//         margin-bottom: 10px;
//         float: left;
//     }
// </style> -->