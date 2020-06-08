<!DOCTYPE html>
<html>
<head>
<
</head>
<body>
<?php
$category = $_GET['q'];
include 'DatabaseConnection.php';
$sql="SELECT post_id, post_content, post_name, user_name, category FROM posts join users on posts.post_by=users.user_id WHERE category = :cat";
$statement1 = $pdoconnection->prepare($sql);
$statement1->bindParam(":cat",$category);
$statement1->execute();

$errors = array();
/*
if ($exerciseContent == null) {
    $errors[] = 'These fields cannot be empty';
}
else {
    $insertExString = "INSERT INTO exercises(exercise_content, exercise_date, ex_category) 
                            VALUES (:content,sysdate(),:category)";
    $statement = $pdoconnection->prepare($insertExString);
    $statement->bindParam(":content", $exerciseContent);
    //$statement->bindParam(":user_id",$user);
    $statement->bindParam(":category", $category);
    $result = $statement->execute();
    if ($result != null) {
        echo 'SUCCESS';
        if($category=="Algebra") {
            header("Location: ./Algebra.php");
        }else if($category=="Calculus"){
            header("Location: ./Calculus.php");
        }else if($category=="Geometry"){
            header("Location: ./Geometry.php");
        }else if($category=="Trigonometry"){
            header("Location: ./Trigonometry.php");
        }
    } else {
        echo 'FAILURE';
    }
}*/
/*echo '<form method="post" action="">
    Add Exercises: <textarea name="exercise_content" /></textarea>
    <input type="submit" value="Add exercise"/>
 </form>';*/
echo '<td><button type="button" onclick="location.href =\'AddEquation.php\'"> Add Equation </button></td>';
echo "<table>
<tr>
<th>Equation</th>
<th>Description</th>
<th>User</th>
<th>Category</th>
</tr>";
if($statement1->rowCount()>0) {
    while ($row = $statement1->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';
        echo '<td><a href="Comments.php?id=' . $row->post_id . '">' . $row->post_content . '</a></td>';
        // $_SESSION['post_id']=$row->post_id;
        echo "<td>" . $row->post_name . "</td>";
        echo "<td>" . $row->user_name . "</td>";
        echo "<td>" . $row->category . "</td>";
        echo '<td><button type="button" onclick="location.href =\'Exercises.php?id='.$row->post_id.'\'"> Exercises </button></td>';
        //echo '<td><button type="button" onclick="location.href =\'Exercises.php?id='.$row->post_id.'\'"> Exercises </button></td></tr>';
        echo '</tr>';
    }

}

echo "</table>";
/*$sql="SELECT post_id, post_content, post_name, user_name, category FROM posts join users on posts.post_by=users.user_id where category='Calculus' and post_id='".$q."'";
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

        echo '<td><button type="button" onclick="location.href =\'Exercises.php?id='.$row->post_id.'\'"> Exercises </button></td></tr>';
    }
    echo "</table>";
}else{
    echo "No equations added yet!";
}
*/

?>
</body>
</html>