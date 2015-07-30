<?php
    $dbhost = 'localhost';
    $dbname = 'testdb';
    $dbuser = 'root';
    $dbpass = '';

    //try to connect to database
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_errno) {
        echo "Failed to connect to database: (" . $conn->connect_errno . ") " . $conn->connect_error;
        console.log("error connecting to db");
        die("error");
    }
?>