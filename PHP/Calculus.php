<?php
session_start();
$_SESSION['category'] = "Calculus";
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title> MEq </title>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../CSS/Categories.css">
    <!--    <link rel="stylesheet" type="text/css" href="../CSS/TopNav.css">-->
    <link rel="stylesheet" type="text/css" href="../CSS/Front+flex.css">

</head>
<body onload="javascript:showCategory('Calculus')">
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
<div class="left">
    <div class="equation-view">
        <form class="fields">
            <input id="equationName" class="input-fields" type="text" placeholder="Ecuation">
            <input id="equationContent" class="input-fields" type="text" placeholder="Description">
            <button type="button" value="AddEq" class="add-eq-btn" onclick="sendEquationData()"> Add Equation</button>
        </form>
        <div id="txtHint"><b>Equations will be listed here...</b></div>

    </div>
</div>

<div class="middle">
    <div id="commentView"><b></b></div>
</div>

<div class="right">
    <div id="exercisesView"><b></b></div>
</div>

<script src="../JS/calculusFunctions.js"></script>

<div class="footer">
    <footer>
        <div class="footer-container">
            <button type="button" onclick="location.href = 'People/Maria.php' ">Maria Istrate</button>
            <button type="button" onclick="location.href = 'People/Daria.php' ">Daria Stărică</button>
            <button type="button" onclick="location.href = 'People/Tudor.php' ">Tudor Mihăiuc</button>
        </div>
    </footer>
</div>
</body>
</html>