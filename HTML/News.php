
<?php
include 'DatabaseConnection.php';
session_start();
?>
<html>
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
                <?php
                if ($_SESSION['logged'] == false) {
                    echo '<button type="button" onclick="location.href =\'Login.php\'">Login</button>';
                } else {
                    echo '<button type="button" onclick="location.href =\'AddEquation.php\'">Add Equation</button>';
                }
                ?>
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

