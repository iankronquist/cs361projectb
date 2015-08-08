<?php
require_once('connection.php');
if (session_status() === PHP_SESSION_NONE){session_start();}

if(isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    $username = $_SESSION['username'];
    $fname = $_SESSION['fname'];
    $userID = $_SESSION['userID'];
} else {
    header("Location: Registration.php");
    exit();
}


$stmt = "SELECT * FROM p2_users WHERE id='$userID'";
$result = $conn->query($stmt);
$row = $result->fetch_array(MYSQLI_ASSOC);

$age = ($row['age'] != null) ? $row['age'] : null;
$height = ($row['height'] != null) ? $row['height'] : null;
$weight = ($row['weight'] != null) ? $row['weight'] : null;
$location = ($row['location'] != null) ? $row['location'] : null;

$last_plasma = ($row['last_plasma'] != null) ? date('m/d/Y', strtotime($row['last_plasma'])) : null;
$last_platelets = ($row['last_platelets'] != null) ? date('m/d/Y', strtotime($row['last_platelets'])) : null;
$last_drbloodcells = ($row['last_drbloodcells'] != null) ? date('m/d/Y', strtotime($row['last_drbloodcells'])) : null;
$last_wholeblood = ($row['last_wholeblood'] != null) ? date('m/d/Y', strtotime($row['last_wholeblood'])) : null;

$stmt = "SELECT * FROM p2_users WHERE id='$userID'";
$result = $conn->query($stmt);
$row = $result->fetch_array(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title></title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mystyle.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        
        
    </head>
    <body>
        <?php require_once('navbar.php') ?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"> Basic Information </div>
                <div class="panel-body">
                    
                    <form>
                        <div class="form-group">
                            
                            <div class="input-group">
                                <span class="input-group-addon">Age:</span>
                                <input type="number" class="updateUserFields form-control" min="16" max="150" name="age" placeholder="<?php echo $age; ?>"/>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Height (cm):</span>
                                <input type="number" class="updateUserFields form-control" min="0" max="9999" name="height" placeholder="<?php echo $height; ?>"/>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Weight (lbs):</span>
                                <input type="number" class="updateUserFields form-control" min="0" max="9999" name="weight" placeholder="<?php echo $weight; ?>"/>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon">State:</span>
                                <input type="text" class="updateUserFields form-control" name="location" placeholder="<?php echo $location; ?>"/>
                            </div>
                            <div class="location-error" id="location-error"></div>
                            
                        </div>
                    </form>
                </div>
            </div>
            
            <!----- BLOOD INFO -->
            <div class="panel panel-default">
                <div class="panel-heading"> Blood Info </div>
                <div class="panel-body"> 
                        <div class="input-group">
                            <span class="input-group-addon">Last Plasma:</span>
                            <input type="date" class="updateBloodInfo form-control"  name="last_plasma"/>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">Last Platelets:</span>
                            <input type="date" class="updateBloodInfo form-control"  name="last_platelets" />
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">Last DR Blood Cells:</span>
                            <input type="date" class="updateBloodInfo form-control"  name="last_drbloodcells"/>
                        </div>
                    
                        <div class="input-group">
                            <span class="input-group-addon">Last Whole Blood:</span>
                            <input type="date" class="updateBloodInfo form-control"  name="last_wholeblood"/>
                        </div>
                </div>
                
            </div>
                    
                
            
        </div>  
        

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        

            <script>
                setInputDate(<?php echo "'$last_plasma'" ?> + "", "last_plasma");
                setInputDate(<?php echo "'$last_platelets'" ?> + "", "last_platelets");
                setInputDate(<?php echo "'$last_drbloodcells'" ?> + "", "last_drbloodcells");
                setInputDate(<?php echo "'$last_wholeblood'" ?> + "", "last_wholeblood");
                
            </script>



        
    </body>
</html>