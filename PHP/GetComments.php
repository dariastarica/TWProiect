<?php
session_start();

$postId = $_GET['postId'];

include 'DatabaseConnection.php';


$sql = "SELECT comment_id, comment_content,time_to_sec(timediff(current_timestamp, comment_date)) / 3600 as comment_time, comment_on_post_id,user_name FROM comments join users u on comments.comment_by = u.user_id  where comments.comment_on_post_id=:postId";
$statement = $pdoconnection->prepare($sql);

$statement->bindParam(":postId", $postId);
$statement->execute();
if($_SESSION['logged'] == true) {
    echo '<form>
        <input id="commentContent" type="text" placeholder="Comment">
        <button type="button" value="AddComment" onclick="sendCommentData(' . $postId . ')"> Add Comment</button>
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
<th>Comment</th>
<th>Added at </th>
<th>User</th>
</tr>";
if ($statement->rowCount() > 0) {
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        $dateText = processToApproxTime($row->comment_time);

        echo '<tr>';
        echo '<td><a ' . $row->comment_id . '">' . $row->comment_content . '</a></td>';
        echo "<td>" . $dateText . "</td>";
        echo "<td>" . $row->user_name . "</td>";

        echo '</tr>';
    }
}
echo "</table>";


