<?php
include 'DatabaseConnection.php';
$sql="SELECT user_id, user_name, user_email, user_date, user_level FROM users";
$statement = $pdoconnection->prepare($sql);
$statement->execute();

$errors = array();
echo "<table>
<tr>
<th>User ID</th>
<th>Username</th>
<th>User Email</th>
<th>SignUp Date</th>
<th>UserLevel</th>
</tr>";
if($statement->rowCount()>0) {
    while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
        echo '<tr>';

        echo "<td>" . $row->user_id . "</td>";
        echo "<td>" . $row->user_name . "</td>";
        echo "<td>" . $row->user_email . "</td>";
        echo "<td>" . $row->user_date . "</td>";
        echo "<td>" . $row->user_level . "</td>";
        echo '<td><button type="button" class="login-button" onclick="deleteUsers(' . $row->user_id. ')"> Ban User </button></td>';
        echo '<td><button type="button" class="login-button" onclick="promoteUsers(' . $row->user_id. ')"> Promote User To Admin </button></td>';
        echo '<td><button type="button" class="login-button" onclick="demoteUsers(' . $row->user_id. ')"> Demote User From Admin </button></td>';
        echo '</tr>';
    }

}

echo "</table>";

