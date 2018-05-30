<?php
    $uname = "dbtrain_766";
    $pass = "ymtlju";
    $host = "dbtrain.im.uu.se";
    $dbname = "dbtrain_766";
    $connection = new mysqli($host, $uname, $pass, $dbname);

    if ($connection->connect_error)
    {
        die("Connection failed: " .$connection.connect_eror);
    }

?>