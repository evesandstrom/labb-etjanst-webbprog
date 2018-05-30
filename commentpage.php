<?php
    include "include/dbconnection.php";
    include "comment-process.php";

     // Om sessionen är empty redirect till första sidan.
    if(empty($_SESSION['login_user'])){
        header('Location: index.php');
        exit;
    }

    if(isset($_SESSION['login_user'])){
        $logname = $_SESSION['login_user'];
    }

    $connection->set_charset("utf8"); 

?>

<html>
    <head>
        <title>Wordly</title>
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/mystyle.css">
        <script src="assets/js/main.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="header">
            <h1>Välkommen till Wordly</h1>
        </div>
        <div class="welcome">
            <p> <?php echo $logname; ?> du är nu inloggad</p>
            <div class="logout">
                <form method="POST" action="logout-process.php">
                    <input type="submit" value="Logga ut" name="logout_submit"><br/>
                </form>
            </div>
        </div>
        <div class="bigbox">
            <div class="comments">
                <form onsubmit="return validateComment()" name="postComment" method="POST">
                    <p>Skriv en kommentar</p><br>
                    <span><?php echo "<p class='errorMessage'>". $posterror. "</p>"; ?></span>
                    <p class="errorMessage" id="commentError"></p>
                    <textarea name="newComment" placeholder="Skriv en kommentar"></textarea>
                    <br/>
                    <div class="submitbtn">
                    <input type="submit" name="post_submit" value="Skicka">
                    </div>
                </form>
            </div>
            <div class="posts">
                <p>Kommentarer</p>
                <?php getAll($connection); ?>
                <div class="postName">
                </div>
                <div class="postComment">
                </div>
            </div>
        </div>
    </body>
</html>