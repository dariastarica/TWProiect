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
<div class="main">
    <form action="" METHOD="POST">
        <p class="sign" align="center">Login</p>
        <input name="username" class="un" type="text" align="center" placeholder="Username">
        <input name="password" class="pass" type="password" align="center" placeholder="Password">
        <input type="submit" class="submit" align="center" value="Login"/>
        <p align="center">Don't have an account? Sign up!</p>
        <button class="submit" align="center" value="Sign up!">Sign up</button>
    </form>
</div>

<?php
include 'DatabaseConnection.php';
$password = $_POST['password'];
$username = $_POST['username'];
$errors = array();

if ($password == null || $username == null) {
    $errors[] = 'These fields cannot be empty';
}

$getEmailStatementString = "SELECT user_name, user_pass,user_id FROM users WHERE user_name = :nameParam and user_pass = :passParam";
$statement = $pdoconnection->prepare($getEmailStatementString);
$statement->bindParam(":nameParam", $username);
$statement->bindParam(":passParam", $password);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
    $_SESSION['logged'] = true;
    $_SESSION['user_name'] = $row->user_id;
    echo $_SESSION['user_name'];
    header("Location: ./Front+flex.php");
}
$errors[] = 'User not registered';

foreach ($errors as $key => $value) {

    echo '<li>' . $value . '</li>';
}
echo '</ul>';

?>

</body>

</html>