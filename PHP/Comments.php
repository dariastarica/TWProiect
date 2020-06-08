<?php
session_start();
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title> MEq </title>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
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
    <?php
    include 'DatabaseConnection.php';
    $id=$_GET['id'];

    $sql = "SELECT post_name, post_content from posts where post_id=:id";
    $statement=$pdoconnection->prepare($sql);
    $statement->bindParam(":id",$id);
    $statement->execute();
    while($row=$statement->fetch(PDO::FETCH_OBJ)){
        echo $row->post_content;
    }
    echo '<br>';

    $sql="SELECT comment_id, comment_content, user_name ,comment_date, comment_on_post_id FROM comments join users on comments.comment_by = users.user_id where comment_on_post_id=:id";
    $statement = $pdoconnection->prepare($sql);
    $statement->bindParam(":id",$id);
    $statement->execute();
    if($statement->rowCount()>0){
        echo "<table><tr><th>Date</th><th>Comment</th><th>User</th></tr>";
        while($row=$statement->fetch(PDO::FETCH_OBJ)){
            //var_dump($_SESSION['post_id']);
            echo '<tr>';
            echo '<td>'.$row->comment_date.'</td>';
            // $_SESSION['post_id']=$row->post_id;
            echo "<td>".$row->comment_content."</td>";
            trim($row->comment_content);
            echo "<td>".$row->user_name."</td>";
        }
        echo "</table>";
    }
    ?>
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
