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

if($_SESSION['logged'] == true) {
    echo '<form>
        <input id="exerciseContent" class="input-fields" type="text" placeholder="Exercise">
        <button type="button" class="add-eq-btn" value="AddEx" onclick="sendExerciseData(' . $postId . ')"> Add Exercise</button>
    </form>';
}

echo "<table>
<tr>
<th>Equation</th>
<th>Added at </th>
<th>User</th>
</tr>";
if ($statement->rowCount() > 0) {
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';
        echo '<td><a ' . $row->exercise_id . '">' . $row->exercise_content . '</a></td>';
        echo "<td>" . $row->exercise_date . "</td>";
        echo "<td>" . $row->user_name . "</td>";

        echo '</tr>';
    }
}
echo "</table>";


