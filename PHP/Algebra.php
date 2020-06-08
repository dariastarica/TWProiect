<!DOCTYPE html>
<?php
session_start();
$_SESSION['category'] = "Algebra";
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title> MEq </title>
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
<div class="equation-view">

    <form>
        <input id="equationName" type="text" placeholder="Ecuation">
        <input id="equationContent" type="text" placeholder="Description">
        <button type="button" value="AddEq" onclick="sendEquationData()"> Add Equation</button>
    </form>

    <script>
        function showCategory(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "GetCategory.php?q=" + str, true);
                xmlhttp.send();
            }
        }

        function sendEquationData() {
            var name = document.getElementById("equationName").value;
            var content = document.getElementById("equationContent").value;
            console.log(name);
            console.log(content);
            var creds = "name=" + name + "&content=" + content;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    if (this.responseText === "SUCCESS") {
                        location.reload();
                    } else {
                        alert(this.responseText);
                    }
                }
            };
            xhttp.open("POST", "./AddEquationController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(creds);
        }
    </script>
    <br>

    <br>
    <div id="txtHint"><b>Equations will be listed here...</b></div>
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
</body>
</html>