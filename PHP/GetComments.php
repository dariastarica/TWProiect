<?php
session_start();

$postId = $_GET['postId'];

include 'DatabaseConnection.php';


$sql = "SELECT comment_id, comment_content,comment_date, comment_on_post_id,user_name FROM comments join users u on comments.comment_by = u.user_id  where comments.comment_on_post_id=:postId";
$statement = $pdoconnection->prepare($sql);

$statement->bindParam(":postId", $postId);
$statement->execute();

echo '<form>
        <input id="commentContent" type="text" placeholder="Comment">
        <button type="button" value="AddComment" onclick="sendCommentData('.$postId.')"> Add Comment</button>
    </form>';


echo "<table>
<tr>
<th>Comment</th>
<th>Added at </th>
<th>User</th>
</tr>";
if ($statement->rowCount() > 0) {
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';
        echo '<td><a ' . $row->comment_id . '">' . $row->comment_content . '</a></td>';
        echo "<td>" . $row->comment_date . "</td>";
        echo "<td>" . $row->user_name . "</td>";

        echo '</tr>';
    }
}
echo "</table>";


