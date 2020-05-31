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
        <p class="sign" align="center">Sign Up</p>
        <input name="username" class="un " type="text" align="center" placeholder="Username">
        <input name="password" class="pass" type="password" align="center" placeholder="Password">
        <input name="email" class="un" type="email" align="centre" placeholder="Email">
        <input type="submit" class="submit" align="center" value="Submit" />
    </form>
</div>

<?php
include 'DatabaseConnection.php';
$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];
$errors = array();

if ($email == null || $password == null || $username == null) {
    $errors[] = 'These fields cannot be empty';
}

$getEmailStatementString = "SELECT * FROM users WHERE user_email = :emailParam";
$statement = $pdoconnection->prepare($getEmailStatementString);
$statement->bindParam(":emailParam", $email);
$statement->execute();
if ($row = $statement->fetch() != null) {
    $errors[] = 'User already registered';
}

$userRegisterStatementString = "INSERT into users (user_name, user_pass, user_email, user_date, user_level) 
                                values (:username, :pass, :email, sysdate(),1)";
$statement = $pdoconnection->prepare($userRegisterStatementString);
$statement->bindParam(":username", $username);
$statement->bindParam(":pass", $password);
$statement->bindParam(":email", $email);

$result = $statement->execute();
if ($result != null) {
    echo 'Registered';
    header("Location: ./Login.php");
} else {
    foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {

        echo '<li>' . $value . '</li>'; /* this generates a nice error list */
    }
    echo '</ul>';
}
?>

</body>

</html>