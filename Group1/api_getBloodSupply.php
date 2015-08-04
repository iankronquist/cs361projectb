<?php
    ini_set('display_errors', 'On');
    require_once('connection.php');
    $state = isset($_GET['state']) ? $conn->real_escape_string($_GET['state']) : null;

    $return_array = [];
    $status = "Failed";

    $errors[] = "$state was set.";
    function getBloodSupply($conn, $state) {
        
        //result handlers
        $result = false;
        
        $id = null;
        $state_returned = null;
        $blood_type_A = null;
        $blood_type_B = null;
        $blood_type_AB = null;
        $blood_type_O = null;

        $wholeblood = null;
        $platelets = null;
        $drbloodcells = null;
        $plasma = null;
        
        
        $stmt = $conn->prepare("SELECT * FROM blooddb WHERE state=?");
        $stmt->bind_param('s', $state);
        if($stmt->execute()){
            $stmt->store_result();
            $row_count = $stmt->num_rows;

            if($row_count > 0) {
                $stmt->bind_result($id, $state_returned, $blood_type_A, $blood_type_B,
                                    $blood_type_AB, $blood_type_O, $wholeblood, $platelets,
                                    $drbloodcells, $plasma);
                $result = [];
                while($stmt->fetch()) {
                    $result[] = $id;
                    $result[] = $state_returned;
                    $result[] = $blood_type_A;
                    $result[] = $blood_type_B;
                    $result[] = $blood_type_AB;
                    $result[] = $blood_type_O;
                    $result[] = $wholeblood;
                    $result[] = $platelets;
                    $result[] = $drbloodcells;
                    $result[] = $plasma;
                }
                
                
                $stmt->free_result();
            } 
            else {
                $result = false;   
            }
        }
        $stmt->close();
        
        return $result;
    }

    if($state) {
        $return_array = getBloodSupply($conn, $state);
        if($return_array)
            $status = "Success";
    }
        
    //return object
    $response_object = array("status" => $status, "result" => $return_array);
    echo json_encode($response_object);
?>