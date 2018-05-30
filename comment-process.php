<?php
    include "include/dbconnection.php";
    include "login-process.php";

    $posterror = "";

    if(isset($_SESSION['login_user'])){
        $logname = $_SESSION['login_user'];
    }

    //Hämtar namn och email från databasen.
    $getUser = "SELECT name, email FROM Users WHERE name = '".$logname."'";
    $activeUser = $connection->query($getUser);

    while($row = $activeUser->fetch_assoc())
            {
                $username = $row["name"];
                $useremail = $row["email"];
            }

    //Om submit -> lagra kommentar och användare i databasen.
    if(isset($_POST["post_submit"]))
    {
        if($_POST["newComment"] != "")
        {
            $comment = $connection->real_escape_string($_POST["newComment"]);
            $query = "INSERT INTO Comments(comment, name, email) VALUES ('".$comment."', '".$username."', '".$useremail."')";
            $connection->query($query);
        }
        else
        {
            $posterror = "Ett fel inträffade, vänligen försök igen.";
        }    
    }

    //Hämta alla kommentarer från användare.
    function getAll($connection)
    {
        $postComment = "SELECT Comments.comment, Comments.name FROM Comments JOIN Users ON Comments.email = Users.email";
        $result = $connection->query($postComment);

        if($result->num_rows > 0)
        {
            foreach($result as $row)
            {
                echo
                '<div class="postName">
                    '.$row["name"].
                '<div class="postComment">
                    '.$row["comment"].
                '</div>';
            }
        }
    }

?>