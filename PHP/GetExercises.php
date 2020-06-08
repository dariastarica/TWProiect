<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
$category = $_GET['q'];

include 'DatabaseConnection.php';

$sql="SELECT exercise_id, exercise_content,exercise_date, exercise_on_post_id,user_name,ex_category FROM exercises join users u on exercises.exercise_by = u.user_id  where ex_category=:cat";
$statement = $pdoconnection->prepare($sql);
$statement->bindParam(":cat",$category);
//$statement->bindParam(":cat",$category);
$statement->execute();
if($statement->rowCount()>0){
    echo "<table><tr><th>Date added</th><th>Exercise</th><th>Added by</th><th>Category</th></tr>";
    while($row=$statement->fetch(PDO::FETCH_OBJ)){
        echo '<tr>';
        echo '<td>'.$row->exercise_date.'</td>';
        echo "<td>".$row->exercise_content."</td>";
        echo "<td>".$row->user_name."</td>";
        echo "<td>".$row->ex_category."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>
</body>
</html>
