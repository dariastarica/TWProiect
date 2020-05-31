<html>

<head>
    <link rel="stylesheet" href="../CSS/Signin.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Log in</title>
</head>

<body>
<div class="main">
    <form action="" METHOD="POST">
        <p class="sign" align="center">Login</p>
        <input name="username" class="un" type="text" align="center" placeholder="Username">
        <input name="password" class="pass" type="password" align="center" placeholder="Password">
        <input type="submit" class="submit" align="center" value="Login" />
        <p align = "center">Don't have an account? Sign up!</p>
        <button class="submit" align="center" value ="Sign up!">Sign up</button>
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

$getEmailStatementString = "SELECT user_name, user_pass FROM users WHERE user_name = :nameParam and user_pass = :passParam";
$statement = $pdoconnection->prepare($getEmailStatementString);
$statement->bindParam(":nameParam", $username);
$statement->bindParam(":passParam",$password);
$statement->execute();
if ($row = $statement->fetch() == null) {
    $errors[] = 'User not registered';
}
else {
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['user_id']    = $row['user_id'];
        $_SESSION['user_name']  = $row['user_name'];
    }
    echo 'Loged in';

}

foreach ($errors as $key => $value){/* walk through the array so all the errors get displayed / {

        echo '<li>' . $value . '</li>'; / this generates a nice error list */
    }
    echo '</ul>';

?>

</body>

</html>