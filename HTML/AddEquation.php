<?php
session_start();
echo '<form method="post" action="">
    Equation name: <input type="text" name="eq_name" />
    Equation description: <textarea name="eq_content" /></textarea>
    <input type="submit" value="Add Equation" />
 </form>';

include 'DatabaseConnection.php';

$eqName = $_POST['eq_name'];
$eqContent = $_POST['eq_content'];
$username = $_SESSION['user_name'];
echo $username;

$eqCategory = "Algebra"; //aleasa din drop down, pus algebra doar ca sa mearga
$errors = array();

if ($eqContent == null || $eqName == null) {
    $errors[] = 'These fields cannot be empty';
}
else {

    $insertEqString = "INSERT INTO posts(POST_CONTENT, POST_DATE, POST_BY, CATEGORY, post_name) VALUES (:content,sysdate(),:userName,:cat,:description)";
    $statement = $pdoconnection->prepare($insertEqString);
    $statement->bindParam(":content", $eqName);
    $statement->bindParam(":userName",$username );
    $statement->bindParam(":cat", $eqCategory);
    $statement->bindParam(":description", $eqContent);
    $result = $statement->execute();
    if ($result != null) {
        echo 'Equation added!';
    } else {
        foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {

            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
    }
}
