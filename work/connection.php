<?php
    $servername = "localhost";
    $dbname='recipeblog';
    $username = "root";
    $password = "";
    
    $db = new mysqli($servername, $username, $password, $dbname);
    
    if ($db->connect_error) 
    {
        die("Connection failed: " . $db->connect_error);
    }
    echo "";
    ?>