<?php
session_start();
include 'DatabaseConnection.php';

$commentContent = $_POST['content'];
$user = $_SESSION['user_id'];
$postId=$_POST['id'];

//echo $commentContent;
$errors = array();

if ($commentContent == null) {
    $errors[] = 'These fields cannot be empty';
}
else {
    $insertCommString = "INSERT INTO comments(comment_content, comment_by, comment_date, comment_on_post_id) 
                            VALUES (:content,:user_id,sysdate(),:post_id)";
    $statement = $pdoconnection->prepare($insertCommString);
    $statement->bindParam(":content", $commentContent);
    $statement->bindParam(":user_id",$user);
    $statement->bindParam(":post_id", $postId);
    $result = $statement->execute();
    if ($result != null) {
        echo 'SUCCESS';
    } else {
        echo 'NASPA';
    }
}

