<?php
session_start();
include 'DatabaseConnection.php';

$exerciseContent = $_POST['content'];
$postId=$_POST['id'];

$user = $_SESSION['user_id'];
$category = $_SESSION['category'];


if ($exerciseContent == null) {
    echo 'This field cannot be empty';
}
else {
    $insertExString = "INSERT INTO exercises(exercise_content, exercise_by, exercise_date, exercise_on_post_id,ex_category) 
                            VALUES (:content,:user_id,sysdate(),:post_id,:cat)";
    $statement = $pdoconnection->prepare($insertExString);
    $statement->bindParam(":content", $exerciseContent);
    $statement->bindParam(":user_id",$user);
    $statement->bindParam(":post_id", $postId);
    $statement->bindParam(":cat", $category);
    $result = $statement->execute();
    if ($result != null) {
        echo 'SUCCESS';
    } else {
        echo 'ERROR ADDING YOUR EXERCISE';
    }
}
