<?php
session_start();
include 'DatabaseConnection.php';

$exerciseContent = $_POST['content'];
$user = $_SESSION['user_id'];
$postId=$_POST['id'];

$errors = array();

if ($exerciseContent == null) {
    $errors[] = 'These fields cannot be empty';
}
else {
    $insertExString = "INSERT INTO exercises(exercise_content, exercise_by, exercise_date, exercise_on_post_id) 
                            VALUES (:content,:user_id,sysdate(),:post_id)";
    $statement = $pdoconnection->prepare($insertExString);
    $statement->bindParam(":content", $exerciseContent);
    $statement->bindParam(":user_id",$user);
    $statement->bindParam(":post_id", $postId);
    $result = $statement->execute();
    if ($result != null) {
        echo 'SUCCESS';
    } else {
        echo 'NASPA';
    }
}
