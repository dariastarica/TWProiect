<html>
<?php
include 'DatabaseConnection.php';
?>
<head>
    <link rel="stylesheet" href="../CSS/News.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>News</title>
</head>
    <body>
        <div class="topnav">
            <a href="Front+flex.php">Home</a>
            <a class="active" href="News.php">News</a>
            <a href="Categories.php">Categories</a>
            <a href="Contact.php">Contact</a>
            <div class="login-container">
                <button type="button" onclick="location.href ='Login.html'">Login</button>
            </div>
        </div>
        <div class="main-section">
            <div class="news-title">This week's equation</div>
            <div class="mini-title">The discriminant equation</div>
            <div class="equation eq-text">This is a placeholder text for the equation to come</div>
        </div>
        <?php
        echo "Salut!";
        ?>
    </body>
</html>

