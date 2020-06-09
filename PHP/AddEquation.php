<!DOCTYPE html>
<?php
session_start();
//$category=$_SESSION['Algebra'];
?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MEq </title>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../CSS/Front+flex.css">
</head>
<body onload="javascript:showCategory('Algebra')">
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

<div>
    <form>
        <input id="equationName" type="text">
        <input id="equationContent" type="text">
        <button type="button" value="AddEq" onclick="sendData()"> Add Equation</button>
    </form>
</div>

<div class="footer">
    <footer>
        <div class="footer-container">
            <button type="button" onclick="location.href = 'People/Maria.php' ">Maria Istrate</button>
            <button type="button" onclick="location.href = 'People/Daria.php' ">Daria Stărică</button>
            <button type="button" onclick="location.href = 'People/Tudor.php' ">Tudor Mihăiuc</button>
        </div>
    </footer>
</div>

<script>
    function sendEquationData() {
        var name = document.getElementById("equationName").value;
        var content = document.getElementById("equationContent").value;

        var creds = "name=" + name + "&content=" + content;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                if (this.responseText === "SUCCESS") {
                    window.location.replace("")
                }
            }
        };
        xhttp.open("POST", "./AddEquationController.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(creds);
    }
</script>
</body>
</html>