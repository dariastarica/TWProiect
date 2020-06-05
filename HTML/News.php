
<?php
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
            <a href="index.php">Home</a>
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
            <?php
            include 'DatabaseConnection.php';
            $statementString = "SELECT post_name, post_content from posts order by post_date limit 1";
            $statement = $pdoconnection->prepare($statementString);
            $statement->execute();
            $row= $statement->fetch(PDO::FETCH_OBJ);
            $name=$row->post_name;
            $content=$row->post_content;
            ?>
            <div class="news-title">This week's equation</div>
            <div class="mini-title">
                <?php echo $name; ?>
            </div>
            <div class="equation eq-text">
                <?php echo $content; ?>
            </div>
        </div>

    </body>
</html>

