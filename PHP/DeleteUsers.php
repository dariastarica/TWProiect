<?php
include 'DatabaseConnection.php';
$id=$_POST['userId'];
echo $id;
$sql="DELETE from comments where comment_by=:id";
$statement = $pdoconnection->prepare($sql);
$statement->bindParam(":id",$id);
$result=$statement->execute();
$sql="DELETE from exercises where exercise_by=:id";
$statement = $pdoconnection->prepare($sql);
$statement->bindParam(":id",$id);
$result=$statement->execute();
$sql="DELETE from posts where post_by=:id";
$statement = $pdoconnection->prepare($sql);
$statement->bindParam(":id",$id);
$result=$statement->execute();
$sql="DELETE from users where user_id=:id";
$statement = $pdoconnection->prepare($sql);
$statement->bindParam(":id",$id);
$result=$statement->execute();
if ($result != null) {
    echo 'SUCCESS';
}else{
    echo 'error';
}
