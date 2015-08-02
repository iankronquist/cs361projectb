<?php

require_once('connection.php');
//if (session_status() === PHP_SESSION_NONE){session_start();}
session_start();

$msgs = [];
$status = "Failed";

$username = isset($_POST['l_username']) ? $conn->real_escape_string($_POST['l_username']) : null;
$password = isset($_POST['l_password']) ? $conn->real_escape_string($_POST['l_password']) : null;
$userID = null;
$fname = null;

if($username && $password){
    //check table
    $stmt = $conn->prepare("SELECT id, fname FROM p2_users WHERE username=? AND password=? LIMIT 1");
    $stmt->bind_param('ss', $username, $password);
    if($stmt->execute()){
        $stmt->store_result();
        $row_count = $stmt->num_rows;
        
        if($row_count > 0) {
            $status = "Success";
            $msgs[] = "Logged in successfully.";
            
            if (session_status() === PHP_SESSION_NONE){session_start();}
            $_SESSION['auth'] = 1;
            
            $stmt->bind_result($userID, $fname);
            while($stmt->fetch()) {
                $_SESSION['username'] = $username;
                $_SESSION['fname'] = $fname;
                $_SESSION['userID'] = $userID;
            }
            

            $stmt->free_result();

            // ob_start(); // ensures anything dumped out will be caught

            // // do stuff here
            // $url = 'www.google.com'; // this can be set based on whatever

            // // clear out the output buffer
            // while (ob_get_status()) 
            // {
            //     ob_end_clean();
            // }

            // no redirect
            // header( "Location: $url" );
        } else {
            $msgs[] = "Username/Password combination not found.";   
            $status = "Failed";
        }
    } else {
        $msgs[] = "Execute Failed in validate_login.";   
    }
    
    
    $stmt->close();
} else {
    $status = "Failed";
    $msgs[] = "Username and Password are required.";
}

$response_object = array('status' => $status, 'messages' => $msgs);
echo json_encode($response_object);


?>