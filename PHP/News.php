
<?php
session_start();
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="../CSS/News.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <title>News</title>
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
        <div class="main-section">
            <div class="news-title">This week's equation</div>
            <div class="mini-title" id = "miniTitle">
            </div>
            <div class="equation eq-text" id="equationText">
            </div>
        </div>

    <script>
        let miniTitleDiv = document.getElementById("miniTitle");
        let eqDiv = document.getElementById("equationText");

        function callAsyncNews(URL){
            let request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if(request.readyState === 4 && request.status === 200){
                    // console.log(request.responseText);
                    let json = JSON.parse(request.responseText);
                    miniTitleDiv.textContent = json.name;
                    eqDiv.textContent = json.content;
                }
            };

            request.open('GET', URL);
            request.send(null);
        }

        callAsyncNews('./NewsController.php');
    </script>
    </body>
</html>

