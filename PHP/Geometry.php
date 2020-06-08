<!DOCTYPE html>
<?php
session_start();
$_SESSION['category'] = "Geometry";
?>
<html lang="en">

<head>
    <title> MEq </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../CSS/Categories.css">
    <!--    <link rel="stylesheet" type="text/css" href="../CSS/TopNav.css">-->
    <link rel="stylesheet" type="text/css" href="../CSS/Front+flex.css">

</head>
<body onload="javascript:showCategory('Geometry')">
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
        <br>
        <br>
        <div id="txtHint"><b>Equations will be listed here...</b></div>
    </div>
</div>
<div class="right">
    <form>
        <input id="exerciseContent" type="text" placeholder="Exercise">
        <button type="button" value="AddEx" onclick="sendExerciseData()"> Add Exercise</button>
    </form>

    <div id="exercisesView"><b></b></div>

</div>

<script>
    function showCategory(str) {
        if (str === "") {
            document.getElementById("txtHint").innerHTML = "";

        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","GetCategory.php?q="+str,true);
            xmlhttp.send();
        }
    }

    function showExercises(postId){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                //alert(this.responseText);
                document.getElementById("exercisesView").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","GetExercises.php?postId=" + postId,true);
        xmlhttp.send();

    }


    function sendEquationData() {
        var name = document.getElementById("equationName").value;
        var content = document.getElementById("equationContent").value;

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
    function sendExerciseData() {
        var content = document.getElementById("exerciseContent").value;
        //var id=document
        //var creds = "content=" + content + ;
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
        xhttp.open("POST", "./AddExercisesController.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(creds);
    }
</script>

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