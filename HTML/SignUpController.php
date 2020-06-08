<?php
include 'DatabaseConnection.php';
$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];
$errors = array();

if ($email == null || $password == null || $username == null) {
    $errors[] = 'These fields cannot be empty';
} else {
    $getEmailStatementString = "SELECT * FROM users WHERE user_email = :emailParam";
    $statement = $pdoconnection->prepare($getEmailStatementString);
    $statement->bindParam(":emailParam", $email);
    $statement->execute();
    if ($row = $statement->fetch() != null) {
        $errors[] = 'User already registered';
    } else {
        $hashedPassword = sha1($password);
        $userRegisterStatementString = "INSERT into users (user_name, user_pass, user_email, user_date, user_level) 
                                values (:username, :pass, :email, sysdate(),1)";
        $statement = $pdoconnection->prepare($userRegisterStatementString);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":pass", $hashedPassword);
        $statement->bindParam(":email", $email);

        $result = $statement->execute();
        if ($result != null) {
            echo "SUCCESS";
        }
        else{
            echo "FAILURE";
        }
    }
}
