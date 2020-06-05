<?php
session_start();
$_SESSION['logged'] = false;
?>
<html>

<head>
    <link rel="stylesheet" href="../CSS/Signin.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Log in</title>
</head>

<body>
    <script>
        function userNotFoundAlert(){
            alert('User not found!');
        }
    </script>
<div class="main">
    <form action="" METHOD="POST">
        <p class="sign" align="center">Login</p>
        <input name="username" class="un" type="text" align="center" placeholder="Username">
        <input name="password" class="pass" type="password" align="center" placeholder="Password">
        <input type="submit" class="submit" align="center" value="Login"/>
        <div class="donthave" align="center">Don't have an account? Sign up!</div>
        <button class="submit" onclick="window.location.href='SingUp.php'" align="center" value="Sign up!">Sign up</button>
    </form>
</div>

<?php

include 'DatabaseConnection.php';

$username = $password = "";
if(isset($_POST["username"])&&isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
}
$errors = array();

if (($password == null || $username == null)&&$_SESSION['logged']!=false) {
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
        $_SESSION['user_name'] = $row->user_id;
        echo $_SESSION['user_name'];
        header("Location: ./index.php");
    }
    $errors[] = 'User not registered';
}

    if (isset($errors) && $_SESSION['logged']===false&&isset($_POST["username"])&&isset($_POST["password"])) {
        foreach ($errors as $key => $value) {

            echo "<script type='text/javascript'>alert('$value');</script>";


        }
        echo '</ul>';
    }
?>

</body>

</html>