<?php
session_start();
echo '<form method="post" action="">
    Add Comment: <textarea name="comment_content" /></textarea>
    <input type="submit" value="Add Comment" />
 </form>';

include 'DatabaseConnection.php';

$commentContent = $_POST['comment_content'];
//echo $commentContent;
$username = $_SESSION['user_id'];
//echo $username;
$postId=$_GET['id'];
//$eqCategory = "Algebra"; //aleasa din drop down, pus algebra doar ca sa mearga
$errors = array();

if ($commentContent == null) {
    $errors[] = 'These fields cannot be empty';
}
else {

    $insertCommString = "INSERT INTO comments(comment_content, comment_by, comment_date, comment_on_post_id) 
                            VALUES (:content,:user_id,sysdate(),:post_id)";
    $statement = $pdoconnection->prepare($insertCommString);
    $statement->bindParam(":content", $commentContent);
    $statement->bindParam(":user_id",$username );
    $statement->bindParam(":post_id", $postId);
    $result = $statement->execute();
    if ($result != null) {
        echo 'Comment added!';
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
