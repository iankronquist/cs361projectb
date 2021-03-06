<?php
    ini_set('display_errors', 'On');
    require_once('../Group1/connection.php');
	$dbc = $conn;




	if (session_status() === PHP_SESSION_NONE){session_start();}
	if(isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
	    $username = $_SESSION['username'];
	    $fname = $_SESSION['fname'];
	    $userID = $_SESSION['userID'];
	} else {
	    header("Location: Registration.php");
	    exit();
	}



	

	$query = "SELECT * FROM donations WHERE '$userID'=user_id";
	//$query = "INSERT INTO android_im_account (username, password) VALUES('$username', '$password')";


        if(!mysqli_query($dbc, $query)){
              die('Failed');
	}
	$result=mysqli_query($dbc, $query);

	//$date_given = NULL;
	//$location = NULL;
	//$blood_type = NULL;
	//$donation_type = NULL;
	//$amount = NULL;
        while($row = mysqli_fetch_array($result)) {
			//$id = $row['id'];
			//$user_id = $row['user_id'];
			$date_given = $row['date_given'];
			$location = $row['location'];
			$blood_type = $row['blood_type'];
			$donation_type = $row['donation_type'];
			$amount = $row['amount'];
		if($row['used']){
			$date_used = $row['date_used'];
		}

        }

	$query2 = "SELECT * FROM p2_users WHERE '$userID'=id";
	if(!mysqli_query($dbc, $query2)){
    		die('Failed');
  	}
    	$result2 = mysqli_query($dbc, $query2);
    
  	while($row2 = mysqli_fetch_array($result2)) {
               $fname = $row2['fname'];
               $lname = $row2['lname'];
               $username = $row2['username'];
               $age = $row2['age'];
               $height = $row2['height'];
               $weight = $row2['weight'];
               $location = $row2['location'];
  	}
  
       mysqli_close($dbc);

//echo "Hi!"

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
        <link href="../Group1/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Group1/css/mystyle.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        
        
    </head>
    <body>
        <?php require_once('../Group1/navbar.php') ?>

        
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"> Basic Information </div>
                <div class="panel-body">
                    
                    <form>
                        <div class="form-group">
                            
                            <div class="input-group">
                                <span class="input-group-addon">Name:</span>
                                <input type="number" class="updateUserFields form-control" min="16" max="150" name="age" placeholder="<?php echo $fname; ?>"/>
                            </div>
                            <!--
                            <div class="input-group">
                                <span class="input-group-addon">Height (cm):</span>
                                <input type="number" class="updateUserFields form-control" min="0" max="9999" name="height" placeholder="<?php echo $height; ?>"/>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Weight (lbs):</span>
                                <input type="number" class="updateUserFields form-control" min="0" max="9999" name="weight" placeholder="<?php echo $weight; ?>"/>
                            </div>
                            -->
                            <div class="input-group">
                                <span class="input-group-addon">State:</span>
                                <input type="text" class="updateUserFields form-control" name="location" placeholder="<?php echo $location; ?>"/>
                            </div>
                            <div class="location-error" id="location-error"></div>
                            
                        </div>
                    </form>
                </div>
            </div>
            

            <div class="panel panel-default">
                <div class="panel-heading"> Blood donation </div>
                <div class="panel-body">
                    
                    <form>
                        <div class="form-group">
                            
                            <div class="input-group">
                                <span class="input-group-addon">Date given:</span>
                                <input type="text" class="updateUserFields form-control" min="16" max="150" name="date_given" placeholder="<?php echo $date_given; ?>"/>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">Donation type:</span>
                                <input type="text" class="updateUserFields form-control" min="0" max="9999" name="donation_type" placeholder="<?php echo $donation_type; ?>"/>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Donation amount (pint):</span>
                                <input type="text" class="updateUserFields form-control" min="0" max="9999" name="amount" placeholder="<?php echo $amount; ?>"/>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Date used:</span>
                                <input type="text" class="updateUserFields form-control" name="date_used" placeholder="<?php echo $date_used; ?>"/>
                            </div>
                            <div class="location-error" id="location-error"></div>
                            
                        </div>
                    </form>
                </div>
            </div>  
                
            
        </div>  
        

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../Group1/js/bootstrap.min.js"></script>
        <script src="../Group1/js/script.js"></script>
        
        


        
    </body>
</html>
