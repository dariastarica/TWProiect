<?php
include 'DatabaseConnection.php';
$id=$_POST['userId'];

$sql="UPDATE users SET user_level=0 WHERE user_id = :id";
$statement = $pdoconnection->prepare($sql);
$statement->bindParam(":id",$id);
$result=$statement->execute();

if ($result != null) {
    echo 'SUCCESS';
}else{
    echo 'error';
}

