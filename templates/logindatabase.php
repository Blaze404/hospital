<?php

    $host = "localhost";
    $username = "root";
    $password = "iamblaze";

    function get_conn($database="niti"){
        global $servername;
        global $username;
        global $password;
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check connection
        
        return $conn;
    }
    //if(session_status()!=PHP_SESSION_ACTIVE) session_start();



?>