<?php
include 'DatabaseConnection.php';
$statementString = "SELECT post_name, post_content from posts order by post_date desc limit 1";
$statement = $pdoconnection->prepare($statementString);
$statement->execute();
$row= $statement->fetch(PDO::FETCH_OBJ);
$name=$row->post_name;
$content=$row->post_content;

//echo $name;
//echo $content;

http_response_code(200);
echo json_encode(['name'=>$name, 'content'=>$content]), PHP_EOL;