<html>

<head>
    <link rel="stylesheet" href="../CSS/Signin.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Sign Up</title>

    <script>
        function signUp() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var email= document.getElementById("email").value;
            var creds = "username="+username+"&password="+password+"&email="+email;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    if(this.responseText === "SUCCESS"){
                        window.location.replace("./Login.php");
                    }
                    else{
                        alert("ERROR, TRY AGAIN");
                    }
                }
            };
            xhttp.open("POST", "./SignUpController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(creds);
        }

    </script>
</head>

<body>
<div class="main">
    <form action="" METHOD="POST">
        <p class="sign" align="center">Sign Up</p>
        <input id="username" class="un " type="text" align="center" placeholder="Username">
        <input id="password" class="pass" type="password" align="center" placeholder="Password">
        <input id="email" class="un" type="email" align="centre" placeholder="Email">
        <button type="button" class="submit" align="center" value="Submit" onclick="signUp();">Sign Up</button>
    </form>
</div>

</body>

</html>