<style>
    <?php
        include '../CSS/TopNav.css';
    ?>
</style>
<?php
if ($_SESSION['logged'] == false) {
    echo '<form action="" method="post"> 
                    <input type="submit" name="login" value="Login" class="login-button"/>
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
        header("Refresh:0");
    }