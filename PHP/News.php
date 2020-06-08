
<?php
session_start();
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="../CSS/News.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <title>News</title>
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
        <div class="main-section">
            <?php
            include 'DatabaseConnection.php';
            $statementString = "SELECT post_name, post_content from posts order by post_date desc limit 1";
            $statement = $pdoconnection->prepare($statementString);
            $statement->execute();
            $row= $statement->fetch(PDO::FETCH_OBJ);
            $name=$row->post_name;
            $content=$row->post_content;
            ?>
            <div class="news-title">This week's equation</div>
            <div class="mini-title">
                <?php echo $content; ?>
            </div>
            <div class="equation eq-text">
                <?php echo $name; ?>
            </div>
        </div>

    </body>
</html>

