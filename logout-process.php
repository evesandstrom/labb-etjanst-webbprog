<?php
    session_start();
   
    if(isset($_POST["logout_submit"])){
        session_unset();
        session_destroy();
        header("Refresh: 0; URL=index.php");
    }

?>