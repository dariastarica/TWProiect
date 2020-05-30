<?php

echo '<form method="post" action="">
    Equation name: <input type="text" name="eq_name" />
    Equation description: <textarea name="eq_content" /></textarea>
    <input type="submit" value="Add Equation" />
 </form>';
//mai trebuie un drop down cu in ce categorie vrei sa adaugi

include 'DatabaseConnection.php';

$eqContent = $_POST['eq_content'];
$userID = 1; //din sesion
$eqCategory = "Algebra"; //aleasa din drop down, pus algebra doar ca sa mearga
$errors = array();

if ($eqContent == null || $eqContent == null) {
    $errors[] = 'These fields cannot be empty';
}

$insertEqString = "INSERT INTO posts(POST_CONTENT, POST_DATE, POST_BY, CATEGORY) VALUES (:content,sysdate(),:userID,:cat)";
$statement = $pdoconnection->prepare($insertEqString);
$statement->bindParam(":content", $eqContent);
$statement->bindParam(":userID", $userID);
$statement->bindParam(":cat", $eqCategory);
$result = $statement->execute();
if ($result != null) {
    echo 'Equation added!';
} else {
    foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {

        echo '<li>' . $value . '</li>'; /* this generates a nice error list */
    }
    echo '</ul>';
}
