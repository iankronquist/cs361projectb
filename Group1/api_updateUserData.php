<?php
    
    require_once('connection.php');
    ini_set('display_errors', 'On');

    if (session_status() === PHP_SESSION_NONE){session_start();}
    $id = $_SESSION['userID'];

    $age = isset($_POST['age']) ? $conn->real_escape_string($_POST['age']) : null;
    $height = isset($_POST['height']) ? $conn->real_escape_string($_POST['height']) : null;
    $weight = isset($_POST['weight']) ? $conn->real_escape_string($_POST['weight']) : null;
    $location = isset($_POST['location']) ? $conn->real_escape_string($_POST['location']) : null;
    $last_plasma = isset($_POST['last_plasma']) ? $conn->real_escape_string($_POST['last_plasma']) : null;
    $last_platelets = isset($_POST['last_platelets']) ? $conn->real_escape_string($_POST['last_platelets']) : null;
    $last_drbloodcells = isset($_POST['last_drbloodcells']) ? $conn->real_escape_string($_POST['last_drbloodcells']) : null;
    $last_wholeblood = isset($_POST['last_wholeblood']) ? $conn->real_escape_string($_POST['last_wholeblood']) : null;

    

    function updateUser($conn, $col_name, $col_value, $uid)
    {
        $prep_query = "UPDATE p2_users SET $col_name='$col_value' WHERE id='$uid' LIMIT 1";
        $result = $conn->query($prep_query);
        
        if($result)
            return true;
        else
            return false;
    }
    

    //check which POST DATA was received
    if($age)
        updateUser($conn, 'age', $age, $id);
    if($height)
        updateUser($conn, 'height', $height, $id);
    if($weight)
        updateUser($conn, 'weight', $weight, $id);
    if($location)
        updateUser($conn, 'location', $location, $id);
    if($last_plasma)
        updateUser($conn, 'last_plasma', $last_plasma, $id);
    if($last_platelets)
        updateUser($conn, 'last_platelets', $last_platelets, $id);
    if($last_drbloodcells)
        updateUser($conn, 'last_drbloodcells', $last_drbloodcells, $id);
    if($last_wholeblood)
        updateUser($conn, 'last_wholeblood', $last_wholeblood, $id);

?>