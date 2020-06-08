<?php
session_start();
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <title> MEq </title>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="../CSS/Front+flex.css">
</head>

<body>
<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="News.php">News</a>
    <a href="Categories.php">Categories</a>
    <a href="Contact.php">Contact</a>
    <div class="login-container">
        <?php
        include 'TopNav.php';
        ?>
    </div>
</div>

lista useri
delete useri

<div>
    <div id="usersList"><b>Users will be listed here...</b></div>
</div>

<script>
  function showUsers() {
          let xmlhttp = new XMLHttpRequest();
      console.log("plm");
          xmlhttp.onreadystatechange = function() {
              if (this.readyState === 4 && this.status === 200) {
                  console.log(this.responseText);
                  document.getElementById("usersList").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","./AdminPageController.php",true);
          xmlhttp.send();
      console.log("sent");
      }
  function deleteUsers(userId) {
      let xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
              if(this.responseText === "SUCCESS")
                  location.reload();
              }
              //document.getElementById("usersList").innerHTML = this.responseText;
          }
      xmlhttp.open("POST","./DeleteUsers.php",true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("userId="+userId);
      console.log("sent");
  }

  showUsers();
</script>

<div class="footer">
    <footer>
        <div class="footer-container">
            <button type="button" onclick="location.href = 'People/Maria.php' ">Maria Istrate</button>
            <button type="button" onclick="location.href = 'People/Daria.php' ">Daria Stărică</button>
            <button type="button" onclick="location.href = 'People/Tudor.php' ">Tudor Mihăiuc</button>
        </div>
    </footer>
</div>

<!--<script> showUsers(); </script>-->
</body>

</html>
