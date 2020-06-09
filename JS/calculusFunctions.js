function showCategory(str) {
    if (str === "") {
        document.getElementById("txtHint").innerHTML = "";

    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "GetCategory.php?q=" + str, true);
        xmlhttp.send();
    }
}

function showExercises(postId) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            //alert(this.responseText);
            document.getElementById("exercisesView").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "GetExercises.php?postId=" + postId, true);
    xmlhttp.send();
}

function showComments(postId) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            //alert(this.responseText);
            document.getElementById("commentView").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "GetComments.php?postId=" + postId, true);
    xmlhttp.send();
}

function sendEquationData() {
    var name = document.getElementById("equationName").value;
    var content = document.getElementById("equationContent").value;

    var creds = "name=" + name + "&content=" + content;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "SUCCESS") {
                location.reload();
            } else {
                alert(this.responseText);
            }
        }
    };
    xhttp.open("POST", "./AddEquationController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(creds);
}

function sendExerciseData(id) {
    var content = document.getElementById("exerciseContent").value;
    var creds = "content=" + content + "&id=" + id;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "SUCCESS") {
                location.reload();
            } else {
                alert(this.responseText);
            }
        }
    };
    xhttp.open("POST", "./AddExercisesController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(creds);
}

function sendCommentData(id) {
    var content = document.getElementById("commentContent").value;
    var creds = "content=" + content + "&id=" + id;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "SUCCESS") {
                location.reload();
            } else {
                alert(this.responseText);
            }
        }
    }
    xhttp.open("POST", "./AddCommentsController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(creds);
}