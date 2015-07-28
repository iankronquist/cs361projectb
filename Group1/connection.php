<?php
    $dbhost = '';
    $dbname = '';
    $dbuser = '';
    $dbpass = '';

    //try to connect to database
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        die("error");
    }
?>