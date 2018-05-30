<?php
    include "include/dbconnection.php";

    $message = "";

    if(isset($_POST["reg_submit"])){
        // Funktionen ger en slumpmässig string som består av 10 bokstäver och/eller siffror.
        function giveRandomString($length = 10) 
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) 
            {
                $randomString .= $characters[mt_rand(0, $charactersLength -1)];
            }
            return $randomString;
        }

        $salt = giveRandomString();

        $errors = array();
        
        // Söker efter mönstret som anges (regular expression) om det inte matchar får vi en error.
        // Ett icke whitespace tecken.
        if (0 === preg_match("/\S+/", $_POST['regName'])){
            $errors['regName'] = "Felaktig input.";
            $message = "Felaktig input";
        }

        // Innehåller tecken, @, tecken, punkt och mer tecken.
        if(0 === preg_match("/.+@.+\..+/", $_POST['regEmail'])){
            $errors['regEmail'] = "Felaktig input";
            $message = "Felaktig input";
        }

        //Kolla om lösenordet innehåller mer än sex tecken.
        if(0 === preg_match("/.{6,}/", $_POST['regPassword'])){
            $errors['regPassword'] = "Felaktig Input";
            $message = "Felaktig input";
        }
        
        // Om ovan if statements inte innehåller några errors så kan vi köra queryn.
        if(0 === count($errors))
        {
            $regname = $connection->real_escape_string($_POST['regName']);
            $regmail = $connection->real_escape_string($_POST['regEmail']);
            $regpass = $connection->real_escape_string($_POST['regPassword']);
            $hashpass = sha1($salt.$regpass);

            //Kolla ifall en användare med samma email redan existerar.
            $getEmail = "SELECT email FROM Users WHERE email = '".$regmail."'";
            $emailExist = $connection->query($getEmail);

            if($emailExist->num_rows == 0)
            {
                $query = "INSERT INTO Users(name, email, password, salt) VALUES ('".$regname."', '".$regmail."', '".$hashpass."', '".$salt."')";
                $connection->query($query);
                $message = "Registrering godkänd! Du kan nu logga in.";
            } 
            else
            {
                $errors['regEmail'] = "Email adressen finns redan.";
                $message = "Email adressen finns redan";
            }
        }
        else
        {
            $message = "Registrering misslyckades.";
        } 
    }


?>