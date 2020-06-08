<?php
session_start();
$_SESSION['logged'] = false;

include 'DatabaseConnection.php';

$username = $password = "";
if(isset($_POST["username"])&&isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
}
$errors = array();

if (($password == null || $username == null) && $_SESSION==false) {
    $errors[] = 'These fields cannot be empty';
} else {
    $hashedPassword = sha1($password);
    $getEmailStatementString = "SELECT user_name, user_pass,user_id FROM users WHERE user_name = :nameParam and user_pass = :passParam";
    $statement = $pdoconnection->prepare($getEmailStatementString);
    $statement->bindParam(":nameParam", $username);
    $statement->bindParam(":passParam", $hashedPassword);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        $_SESSION['logged'] = true;
        $_SESSION['user_id'] = $row->user_id;
        echo 'SUCCESS';

    }
    $errors[] = 'User not registered';
}

if (isset($errors) && $_SESSION['logged']===false&&isset($_POST["username"])&&isset($_POST["password"])) {
    echo $errors;
}


?>