<?php
session_start();
$_SESSION['category']="Calculus";
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
    <?php
    include 'DatabaseConnection.php';
    echo '<button type="button" onclick="location.href =\'AddEquation.php\'"> AddEq </button>';

    $sql="SELECT post_id, post_content, post_name, user_name, category FROM posts join users on posts.post_by=users.user_id where category='Calculus'";
    $statement1 = $pdoconnection->prepare($sql);
    $statement1->execute();
    if($statement1->rowCount()>0){
        echo "<table><tr><th>Equation</th><th>Description</th><th>User</th><th>Category</th></tr>";
        while($row=$statement1->fetch(PDO::FETCH_OBJ)){
            //var_dump($_SESSION['post_id']);
            echo '<tr>';
            echo '<td><a href="Comments.php?id='.$row->post_id.'">'.$row->post_content.'</a></td>';
            // $_SESSION['post_id']=$row->post_id;
            echo "<td>".$row->post_name."</td>";
            echo "<td>".$row->user_name."</td><td>".$row->category."</td>";
            echo '<td><button type="button" onclick="location.href =\'AddComment.php?id='.$row->post_id.'\'"> Add Comment </button></td></tr>';
            echo '<td><button type="button" onclick="location.href =\'Exercises.php?id='.$row->post_id.'\'"> Exercises </button></td></tr>';
        }
        echo "</table>";
    }else{
        echo "No equations added yet!";
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