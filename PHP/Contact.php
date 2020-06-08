<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> MEq </title>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../CSS/Contact.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Front+flex.css">

</head>

<script>
    function goBack(){
        window.history.back(); 
    }
</script>

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
    
    <div class="main">
        <div class="responsive">
            <div class="gallery">
                <a target="_self" href="/HTMLDaria.html">
                    <img src="../images/daria.png" alt="Daria" width="600" height="400">
                </a>
                <div class="desc">
                        Daria Stărică
                </div>
            </div>
        </div>
        
        <div class="responsive">
            <div class="gallery">
                <a target="_self" href="/HTML/Tudor.php">
                    <img src="../images/tudor.png" alt="Tudor" width="600" height="400">
                </a>
                <div class="desc">
                    Tudor Mihăiuc
                </div>
            </div>
        </div>
        
        <div class="responsive">
            <div class="gallery">
                <a target="_self" href="/PHP/Maria.php">
                    <img src="../images/maria.png" alt="Maria" width="600" height="400">
                </a>
                <div class="desc">
                    Maria Istrate
                </div>
            </div>
        </div>
    </div>
    
    
    
     
</body>

</html>