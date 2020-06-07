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
        <p class="sign" align="center">Sign Up</p>
        <input name="username" class="un " type="text" align="center" placeholder="Username">
        <input name="password" class="pass" type="password" align="center" placeholder="Password">
        <input name="email" class="un" type="email" align="centre" placeholder="Email">
        <input type="submit" class="submit" align="center" value="Submit"/>
    </form>
</div>

<?php
include 'DatabaseConnection.php';
$username = $password = $email = "";
if(isset($_POST["username"])&&isset($_POST["password"])&&isset($_POST["email"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];
}
$errors = array();

if ($email == null || $password == null || $username == null) {
    $errors[] = 'These fields cannot be empty';
} else {
    $getEmailStatementString = "SELECT * FROM users WHERE user_email = :emailParam";
    //$getUserString = "SELECT * FROM users WHERE user_name = :nameParam";
    $statement = $pdoconnection->prepare($getEmailStatementString);
    //$statement2 = $pdoconnection->prepare($getUserString);
    $statement->bindParam(":emailParam", $email);
    //$statement->bindParam(":nameParam", $username);
    $statement->execute();
    //$statement2->execute();
    if ($row = $statement->fetch() != null) {
        echo "<script type='text/javascript'>alert('This email address is already in use!';</script>)";
    } /*else if($row2 = $statement2->fetch()!= null) {
        echo "<script type='text/javascript'>alert('This username is already in use!';</script>)";
    }*/
    else{
        $hashedPassword = sha1($password);
        $userRegisterStatementString = "INSERT into users (user_name, user_pass, user_email, user_date, user_level) 
                                values (:username, :pass, :email, sysdate(),1)";
        $statement = $pdoconnection->prepare($userRegisterStatementString);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":pass", $hashedPassword);
        $statement->bindParam(":email", $email);

        $result = $statement->execute();
        if ($result != null) {
            echo 'Registered';
            header("Location: ./index.php");
        } else {
            foreach ($errors as $key => $value)  {

                echo '<li>' . $value . '</li>';
            }
            echo '</ul>';
        }
    }
}
?>

</body>

</html>