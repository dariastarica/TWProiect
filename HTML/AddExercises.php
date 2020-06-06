<?php
session_start();
echo '<form method="post" action="">
    Add Exercises: <textarea name="exercise_content" /></textarea>
    <input type="submit" value="Add exercise"/>
 </form>';

include 'DatabaseConnection.php';

$exerciseContent = $_POST['exercise_content'];
$user = $_SESSION['user_id'];
$postId=$_GET['id'];

$errors = array();

if ($exerciseContent == null) {
    $errors[] = 'These fields cannot be empty';
}
else {
    $insertExString = "INSERT INTO exercises(exercise_content, exercise_by, exercise_date, exercise_on_post_id) 
                            VALUES (:content,:user_id,sysdate(),:post_id)";
    $statement = $pdoconnection->prepare($insertExString);
    $statement->bindParam(":content", $exerciseContent);
    $statement->bindParam(":user_id",$user);
    $statement->bindParam(":post_id", $postId);
    $result = $statement->execute();
    if ($result != null) {
        echo 'Exercise added!';
        if($_SESSION['category']=="Algebra") {
            header("Location: ./Algebra.php");
        }else if($_SESSION['category']=="Calculus"){
            header("Location: ./Calculus.php");
        }else if($_SESSION['category']=="Geometry"){
            header("Location: ./Geometry.php");
        }else if($_SESSION['category']=="Trigonometry"){
            header("Location: ./Trigonometry.php");
        }
    } else {
        foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {

            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
    }
}
