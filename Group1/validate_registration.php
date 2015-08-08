<?php

require_once('connection.php');
ini_set('display_errors', 'On');
//if (session_status() === PHP_SESSION_NONE){session_start();}
session_start();

$msgs = []; //any messages for validation
$status = "Failed"; // validation status
$success = false; // boolean for passing all validation requirement

$user_valid = false;
$pass_valid = false;
$fname_valid = false;
$lname_valid = false;

//POST data
$username = isset($_POST['r_username']) ? $conn->real_escape_string($_POST['r_username']) : null;
$password = isset($_POST['r_password']) ? $conn->real_escape_string($_POST['r_password']) : null;
$fname = isset($_POST['r_fname']) ? $conn->real_escape_string($_POST['r_fname']) : null;
$lname = isset($_POST['r_lname']) ? $conn->real_escape_string($_POST['r_lname']) : null;
$sex = isset($_POST['r_sex']) ? $conn->real_escape_string($_POST['r_sex']) : null;
$state = isset($_POST['r_state']) ? $conn->real_escape_string($_POST['r_state']) : null;
$userID = null;


//check username
if (!$_POST['r_username']) {
    $msgs[] = "Must have a username";
} else {
    //check if proper length
    if(strlen($_POST['r_username']) < 5) {
        $msgs[] = "username must be >4 characters";
    } else {
        //check if username already exists in database
        $stmt = $conn->prepare('SELECT username FROM p2_users WHERE username=? LIMIT 1');
        $stmt->bind_param('s', $username);
        if($stmt->execute()){
            $stmt->store_result();
            $row_count = $stmt->num_rows;
            
            if($row_count > 0) {
                $msgs[] = "$username is already in use.";   
            } else {
                $user_valid = true;   
            }
        } else {
            $msgs[] = "Execute Failed";   
        }
        
        $stmt->free_result();
        $stmt->close();
    }
}

//check password
if (!$_POST['r_password']) {
    $msgs[] = "Must have a password.";   
} else {
    if (strlen($_POST['r_password']) < 5) {
        $msgs[] = "Password must be >4 characters";   
    } else {
        $pass_valid =  true;  
    }
}


//check first name and last name
if(!$_POST['r_fname']) {
    $msgs[] = "Must have First Name.";   
} else {
    $fname_valid = true;   
}

if(!$_POST['r_lname']) {
    $msgs[] = "Must have Last Name.";   
} else {
    $lname_valid = true;   
}

//check for success
if ($user_valid && $pass_valid && $fname_valid && $lname_valid) {
    //if all true, then attempt to register to DB
    $stmt = $conn->prepare('INSERT INTO p2_users (username, password, fname, lname, sex, location) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssss', $username, $password, $fname, $lname, $sex, $state);
    $stmt->execute();
    
    //get userID
    $userID = $stmt->insert_id;
    
    //successful registration, create SESSION
    $_SESSION['auth'] = 1;
    $_SESSION['username'] = $username;
    $_SESSION['fname'] = $fname;
    $_SESSION['userID'] = $userID;
    $_SESSION['location'] = $state;
    
    $status = "Success";
    $msgs[] = "$username successfully registered.";
 
}

$response_object = array('status' => $status, 'messages' => $msgs);
echo json_encode($response_object);

?>