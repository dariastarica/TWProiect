<?php
session_start();

$postId = $_GET['postId'];
$category = $_SESSION['category'];
//$postId = 22;
include 'DatabaseConnection.php';

//echo $postId;

$sql = "SELECT exercise_id, exercise_content,exercise_date, exercise_on_post_id,user_name,ex_category FROM exercises join users u on exercises.exercise_by = u.user_id  where exercises.exercise_on_post_id=:postId";
$statement = $pdoconnection->prepare($sql);
//$statement->bindParam(":cat", $category);
$statement->bindParam(":postId", $postId);
$statement->execute();

echo "<table>
<tr>
<th>Equation</th>
<th>Description</th>
<th>User</th>
<th>Category</th>
</tr>";
if ($statement->rowCount() > 0) {
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';
        echo '<td><a href="Comments.php?id=' . $row->exercise_id . '">' . $row->exercise_content . '</a></td>';
        echo "<td>" . $row->exercise_date . "</td>";
        echo "<td>" . $row->user_name . "</td>";

        echo '</tr>';
    }
}
echo "</table>";


