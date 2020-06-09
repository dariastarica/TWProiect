<html lang="en">

<head>
    <link rel="stylesheet" href="../CSS/Signin.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <title>Log in</title>

    <script>
        function login(){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var creds = "username="+username+"&password="+password;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                // console.log(this.responseText.toString())
                if (this.readyState === 4 && this.status === 200) {
                    if(this.responseText === "SUCCESS") {
                        window.location.replace("./index.php");
                    }
                    else{
                        alert("ERROR, TRY AGAIN");
                    }

                }
            };
            xhttp.open("POST", "./LoginController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(creds);
        }
    </script>

</head>

<body>
<script>
    function userNotFoundAlert(){
        alert('User not found!');
    }
</script>
<div class="main">
    <form id="login">
        <p class="sign" align="center">Login</p>
        <input id="username" class="un" type="text" align="center" placeholder="Username">
        <input id="password" class="pass" type="password" align="center" placeholder="Password">

        <div class="donthave" align="center">Don't have an account? Sign up!</div>
        <br/><button type="button" class="submit" align="center" value="Submit" onclick="login();">Sign In</button>
    </form>
    <button class="submit" onclick="window.location.href='SignUp.php'" align="center" value="Sign up!">Sign up</button>
</div>

</body>

</html>