<?php
    include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel = "stylesheet" type = "text/css" href = "register.css"> 
</head>
<body>
    <div class="box-container">
            <div class="title-div">
                <img class="logo" src="logo.jpg" alt="coffee">
                <h2 class="title">Triple Thread Craft</h2>
            </div>
            <div class="register-div">
                <h3 class="sub-title">CREATE YOUR ACCOUNT</h3>
                <form action="signup.php" method="post">
                    <div class="input-group">
                        <input type="text" id="firstname" name="firstname" placeholder="First name" required>
                        <input type="text" id="lastname" name="lastname" placeholder="Last name" required>
                    </div>
                    <div class="input-group">
                        <input type="text" id="age" name="age" name="firstname" placeholder="Age" required>
                    </div>
                    <div class="input-group">
                        <input type="address" id="address" name="address" placeholder="Address" required>
                    </div>
                    <form id="signup-form" method="post" action="signup.php">
    <div class="input-group">
        <input type="text" id="username" name="Username" placeholder="Username" required>
        <span id="username-message"></span>
    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <br>
                    <input class="signup-btn" type="submit" name="submit" value="Sign up">
                    <p>Already have an account? <a class="signin-btn" href="loginpage.php">Sign in</a></p>
                </form>
            </div>
        </div>
        <script>
document.addEventListener("DOMContentLoaded", function() {
    var signupForm = document.getElementById('signup-form');
    var usernameInput = document.getElementById('username');
    var usernameMessage = document.getElementById('username-message');

    signupForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        var username = usernameInput.value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'check_username.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    if (response === 'exists') {
                        usernameMessage.textContent = 'Username already exists';
                    } else {
                        // If username doesn't exist, submit the form
                        signupForm.submit();
                    }
                } else {
                    console.error('Error:', xhr.statusText);
                }
            }
        };
        xhr.send('username=' + encodeURIComponent(username));
    });
});
</script>

</body>
</html>
