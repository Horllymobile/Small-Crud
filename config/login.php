<?php

    $host = 'localhost';
    $username = 'root';
    $pass = '';
    $dbname = 'shop';

    $conn = new mysqli($host,$username,$pass,$dbname);//Initializing the database connection

    if($conn->connect_error){//Checking for connection error
        echo 'Connection error'. $conn->connect_error;
    }

?>