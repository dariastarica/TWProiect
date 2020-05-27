<?php
include 'DatabaseConnection.php';
    $username = $POST['username'];
    $password = $POST['password'];

    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($username);
    $password = mysqli_real_escape_string($password);
?>