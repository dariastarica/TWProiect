<?php
if ($_SESSION['logged'] == false) {
    echo '<form action="" method="post"> 
                    <input type="submit" name="login" value="Login"/>
                  </form>';
    if (isset($_POST['login'])) {
        header("Location: ./Login.php");
    }
} else {
    echo '<form action="" method="post"> 
                    <input type="submit" name="logout" value="Log out"/>
                  </form>';//maria fa css la formul asta
    $_SESSION['logged'] = false;
    //trim($_SESSION['user_id']);
}
