<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> MEq </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../CSS/Front+flex.css">
</head>
<body>
<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="News.php">News</a>
    <a href="Categories.php">Categories</a>
    <a href="Contact.php">Contact</a>
    <div class="login-container">
        <?php
        include 'TopNav.php';
        ?>
    </div>
</div>
<img src="../images/resources/icons/phone.png" alt="Phone" width="100" height="100">
<h1>0747855444</h1>
<div class="footer">
    <footer>
        <div class="footer-container">
            <button type="button" onclick="location.href = 'Maria.php' ">Maria Istrate</button>
            <button type="button" onclick="location.href = 'Daria.php' ">Daria Stărică</button>
            <button type="button" onclick="location.href = 'Tudor.php' ">Tudor Mihăiuc</button>
        </div>
    </footer>
</div>
</body>
</html>

