<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">

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

echo "<table>
<tr>
<th>Equation</th>
<th>Description</th>
<th>User</th>
</tr>";
if($statement1->rowCount()>0) {
    while ($row = $statement1->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';
        echo '<td><a ' . $row->post_id . '">' . $row->post_content . '</a></td>';
        // $_SESSION['post_id']=$row->post_id;
        echo "<td>" . $row->post_name . "</td>";
        echo "<td>" . $row->user_name . "</td>";
        echo '<td><button type="button" class="add-eq-btn" onclick="showComments('.$row->post_id.')"> Comments </button></td>';
        echo '<td><button type="button" class="add-eq-btn" onclick="showExercises('.$row->post_id.')"> Exercises </button></td>';
        echo '</tr>';
    }

}
echo "</table>";

?>
</body>
</html>