<?php
session_start();
include 'DatabaseConnection.php';

$eqName = $_POST['name'];
$eqContent = $_POST['content'];

$username = $_SESSION['user_id'];
$eqCategory = $_SESSION['category'];

/*echo $eqName;
echo $eqContent;
echo $username;
echo $eqCategory;*/


if ($eqContent == null || $eqName == null) {
    $errors = 'These fields cannot be empty';
} else if ($_SESSION['logged'] == false) {
    $errors = 'You are not logged in!';
} else {

    $insertEqString = "INSERT INTO posts(POST_CONTENT, POST_DATE, POST_BY, CATEGORY, post_name) VALUES (:content,sysdate(),:userName,:cat,:description)";
    $statement = $pdoconnection->prepare($insertEqString);
    $statement->bindParam(":content", $eqName);
    $statement->bindParam(":userName", $username);
    $statement->bindParam(":cat", $eqCategory);
    $statement->bindParam(":description", $eqContent);
    $result = $statement->execute();
    //echo $result;
    //echo $insertEqString;
    if ($result != null) {
        echo 'SUCCESS';
    } else {
        echo $errors;
    }
}