<?php
if ($_SESSION['logged'] == false) {
    echo '<form action="" method="post"> 
                    <input type="submit" name="login" value="Login"/>
                  </form>';
} else {
    echo '<form action="" method="post"> 
                    <input type="submit" name="logout" value="Log out"/>
                  </form>';//maria fa css la formul asta
}
if (isset($_POST['login'])) {
    header("Location: ./Login.php");
} else
    if (isset($_POST['logout'])) {
        $_SESSION['logged'] = false;
        trim($_SESSION['user_id']);
    }
    // tre sa apesi de doua ori ca sa iesi

