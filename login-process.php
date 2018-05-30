<?php
    include "include/dbconnection.php";

    session_start();

    $loginError = "";

    if(isset($_POST["login_submit"]))
    {
        if(empty($_POST['logEmail']) || (empty($_POST['logPassword'])))
        {
            $loginError = "Alla fält måste vara ifyllda!";
        }
        else 
        {
            $logmail = $connection->real_escape_string($_POST['logEmail']);
            $logpass = $connection->real_escape_string($_POST['logPassword']);

            // Query för att hämta saltet från databasen för en användare.
            $getSalt = "SELECT name, email, password, salt FROM Users WHERE email = '".$logmail."'";
            $result = $connection->query($getSalt);

            while($row = $result->fetch_assoc())
            {
                $logname = $row["name"];
                $logsalt = $row["salt"];
                $dbpass = $row["password"];
            }

            // Hasha saltet med det inskrivna lösenordet.
            $hashpass = sha1($logsalt.$logpass);

            // Kontrollera om inloggningslösenordet stämmer överens med lösenordet i databasen.
            if($hashpass == $dbpass)
            {
                $_SESSION['login_user'] = $logname;
                header("Refresh: 0; URL=commentpage.php");
            }
            else
            {
                $loginError = "Inloggning misslyckades, var vänlig försök igen.";
            }
        }
    }
    
?>