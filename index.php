<?php
    include "include/dbconnection.php";
    include "login-process.php";
    include "register-process.php";
?>

<html>
    <head>
        <title>Wordly</title>
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/mystyle.css">
        <script src="assets/js/main.js"></script>
    </head>
    <body>
        <div class="header">
            <h1>Välkommen till Wordly</h1>
        </div>
        <div class="bigbox">
            <div class="login">
                <p>Logga in!</p>
                <form onsubmit="return validateLogForm()" name="logForm" method="POST">
                    <span><?php echo "<p class='errorMessage'>".$loginError. "</p>"; ?></span>
                    <p class="errorMessage" id="loginError"></p>
                    <label for="logEmail">E-mail</label><br/>
                    <input type="text" placeholder="Email" id="logEmail" name="logEmail">
                    <br/>
                    <label for="logPassword">Password</label><br/>
                    <input type="password" placeholder="Minst sex tecken" id="logPassword" name="logPassword">
                    <br/>
                    <div class="submitbtn">
                    <input type="submit" value="Skicka" name="login_submit">
                    </div>
                </form>
            </div>
            <div class="register">
                <p>eller registrera dig nu!</p>
                <form onsubmit="return validateRegForm()" name="regForm" method="POST">
                    <span><?php echo "<p class='errorMessage'>".$message. "</p>"; ?></span>
                    <p class="errorMessage" id="regError"></p>
                    <label for="regName">Namn</label><br/>
                    <input type="text" placeholder="Namn" id="regName" name="regName">
                    <br/>
                    <label for="regEmail">E-mail</label><br/>
                    <input type="text" placeholder="Email" id="regEmail" name="regEmail">
                    <br/>
                    <label for="regPassword">Password</label><br/>
                    <input type="password" placeholder="Minst sex tecken" id="regPassword" name="regPassword">
                    <br/>
                    <div class="submitbtn">
                    <input type="submit" value="Skicka" name="reg_submit">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>