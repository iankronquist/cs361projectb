<?php
    $dbhost = 'oniddb.cws.oregonstate.edu';
    $dbname = 'dinhd-db';
    $dbuser = 'dinhd-db';
    $dbpass = 'Mekmy0hd8jvLKeBL';

    //try to connect to database
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_errno) {
        echo "Failed to connect to database: (" . $conn->connect_errno . ") " . $conn->connect_error;
        console.log("error connecting to db");
        die("error");
    }

    $mysqli = $conn; //if anyone used a different connection variable, declare here
?>