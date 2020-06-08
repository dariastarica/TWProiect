<?php
session_start();
$postId= isset($_GET['id']) ? $_GET['id'] : '';
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
<div class="equation-view">
    <form method="post" action="">
        <label for="ex">Content</label><textarea id="ex"> </textarea>
        <br/><button type="button" class="submit" value="Submit" onclick=sendData()>Add</button>
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
    function sendData() {
        var content = document.getElementById("ex").value;
        var id = <?php echo $postId ?>

        var creds = "content="+content+"&id="+id;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                //if(this.responseText === "SUCCESS") {
                alert(this.responseText);

                //}

            }
        };
        xhttp.open("POST", "./AddExercisesController.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(creds);
    }
</script>
</body>
</html>