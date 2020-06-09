<style>
    <?php
        include '../CSS/TopNav.css';
        include 'DatabaseConnection.php';
    ?>
</style>
<?php
if ($_SESSION['logged'] == false) {
    echo '<form action="" method="post"> 
                    <input type="submit" name="login" value="Login" class="login-button"/>
                  </form>';
} else {
    echo '<form action="" method="post"> 
                    <input type="submit" name="logout" class="login-button" value="Log out"/>
                  </form>';
    $id=$_SESSION['user_id'];
    $sql="SELECT user_level FROM users where user_id=:id";
    $statement = $pdoconnection->prepare($sql);
    $statement->bindParam("id",$id);
    $result=$statement->execute();
    $row= $statement->fetch(PDO::FETCH_OBJ);
    if($result != null & $row->user_level == 1){
        echo '<form action="./AdminPage.php" method="post"> 
                    <input name="adminControl" type="submit"  class="login-button" value="Admin Control"/>
                  </form>';
    }
}
if (isset($_POST['login'])) {
    header("Location: ./Login.php");
} else if (isset($_POST['logout'])) {
        $_SESSION['logged'] = false;
        trim($_SESSION['user_id']);
        header("Refresh:0");
    }

