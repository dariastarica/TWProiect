<?php
session_start();

$postId = $_GET['postId'];
$category = $_SESSION['category'];
//$postId = 22;
include 'DatabaseConnection.php';

//echo $postId;

$sql = "SELECT exercise_id, exercise_content,time_to_sec(timediff(current_timestamp, exercise_date)) / 3600 as exercise_time, exercise_on_post_id,user_name,ex_category FROM exercises join users u on exercises.exercise_by = u.user_id  where exercises.exercise_on_post_id=:postId";
$statement = $pdoconnection->prepare($sql);
//$statement->bindParam(":cat", $category);
$statement->bindParam(":postId", $postId);
$statement->execute();

if($_SESSION['logged'] == true) {
    echo '<form>
        <input id="exerciseContent" type="text" placeholder="Exercise">
        <button type="button" value="AddEx" onclick="sendExerciseData(' . $postId . ')"> Add Exercise</button>
    </form>';
}

function processToApproxTime($floatHourValue){
    $strVal = '';
    if($floatHourValue >= 24){
        $strVal = floor($floatHourValue / 24) . ' days ago';
    } else if($floatHourValue >= 1){
        $strVal = floor($floatHourValue) . ' hours ago';
    } else {
        $strVal = floor($floatHourValue * 60) . ' minutes ago';
    }

    return $strVal;
}
echo "<table>
<tr>
<th>Equation</th>
<th>Added at </th>
<th>User</th>
</tr>";
if ($statement->rowCount() > 0) {
    //dateText = processToApproxTime($row->comment_time);
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';
        echo '<td><a ' . $row->exercise_id . '">' . $row->exercise_content . '</a></td>';
        echo "<td>" . processToApproxTime($row->exercise_time) . "</td>";
        echo "<td>" . $row->user_name . "</td>";

        echo '</tr>';
    }
}
echo "</table>";


