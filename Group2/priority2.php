<?php
ini_set('display_errors', 'On');
if (session_status() === PHP_SESSION_NONE){session_start();}

if(isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    $username = $_SESSION['username'];
    $fname = $_SESSION['fname'];
    $userID = $_SESSION['userID'];
    $location = $_SESSION['location'];
} else {
    header("Location: Group1/Registration.php");
    exit();
}


$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'project_b';


$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
}



function getLastPlasma($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT DATEDIFF(CURDATE(), last_plasma) 
		FROM p2_users WHERE id=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
	} else {
		$check->bind_param("i", $id);
		if(!$check->execute()) {
			echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
		} else {
			$retDate = NULL;
			if (!$check->bind_result($retDate)) {
				echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
			} 

			while ($check->fetch()) {
				echo 'Days since last PLASMA donation: ' . "$retDate" . '<br>';
				$retDate;
			}
		}
	}

	return $retDate;

}

function getLastPlatelets($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT DATEDIFF(CURDATE(), last_platelets) 
		FROM p2_users WHERE id=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
	} else {
		$check->bind_param("i", $id);
		if(!$check->execute()) {
			echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
		} else {
			$retDate = NULL;
			if (!$check->bind_result($retDate)) {
				echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
			} 

			while ($check->fetch()) {
				echo 'Days since last PLATELET donation: ' . "$retDate" . '<br>';
				$retDate;
			}
		}
	}

	return $retDate;

}

function getLastDoubleRBC($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT DATEDIFF(CURDATE(), last_drbloodcells) 
		FROM p2_users WHERE id=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
	} else {
		$check->bind_param("i", $id);
		if(!$check->execute()) {
			echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
		} else {
			$retDate = NULL;
			if (!$check->bind_result($retDate)) {
				echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
			} 

			while ($check->fetch()) {
				echo 'Days since last DOUBLE RBC donation: ' . "$retDate" . '<br>';
				$retDate;
			}
		}
	}

	return $retDate;

}

function getLastWhole($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT DATEDIFF(CURDATE(), last_wholeblood) 
		FROM p2_users WHERE id=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
	} else {
		$check->bind_param("i", $id);
		if(!$check->execute()) {
			echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
		} else {
			$retDate = NULL;
			if (!$check->bind_result($retDate)) {
				echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
			} 

			while ($check->fetch()) {
				echo 'Days since last WHOLE donation: ' . "$retDate" . '<br><br>';
				$retDate;
			}
		}
	}

	return $retDate;

}

function getVisitsPlasma($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT count_plasma FROM p2_users WHERE id=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
	} else {
		$check->bind_param("i", $id);
		if(!$check->execute()) {
			echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
		} else {
			$numVisits = NULL;
			if (!$check->bind_result($numVisits)) {
				echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
			} 

			while ($check->fetch()) {
				echo 'Number of plasma donations: ' . "$numVisits" . '<br><br>';
				$numVisits;
			}
		}
	}

	return $numVisits;
}

function getVisitsPlatelets($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT count_platelets FROM p2_users WHERE id=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
	} else {
		$check->bind_param("i", $id);
		if(!$check->execute()) {
			echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
		} else {
			$numVisits = NULL;
			if (!$check->bind_result($numVisits)) {
				echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
			} 

			while ($check->fetch()) {
				echo 'Number of platelet donations: ' . "$numVisits" . '<br><br>';
				$numVisits;
			}
		}
	}

	return $numVisits;
}

function getVisitsDRBC($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT count_drbloodcells FROM p2_users WHERE id=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
	} else {
		$check->bind_param("i", $id);
		if(!$check->execute()) {
			echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
		} else {
			$numVisits = NULL;
			if (!$check->bind_result($numVisits)) {
				echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
			} 

			while ($check->fetch()) {
				echo 'Number of double RBC donations: ' . "$numVisits" . '<br><br>';
				$numVisits;
			}
		}
	}

	return $numVisits;
}

/*User may donate plasma every 28 days and up to 13 times per year */
function plasmaEligible($days, $times)
{
	$daysLeft = 28 - $days;
	$timesLeft = 13 - $times;

/*Need: < 28 days and <= 13 times - fail days
		< 28 days and >= 13 times - fail times and days
		>= 28 days and >= 13 times - fail times
		>= 28 days and < 13 times - pass
		*/
	if ($days < 28 && $times <= 13)
	{
		echo "You will be eligible to donate plasma in <strong>$daysLeft days</strong>." . '<br>';
		echo "You may donate plasma <strong>$timesLeft</strong> more time(s) this year." . '<br>';
		return false;
	} else if ($days < 28 && $times >= 13) {
		echo "You have filled your plasma donation quota for the year." . '<br>';
		return false;
	} else if ($days >= 28 && $times >= 13) {
		echo "You have filled your plasma donation quota for the year." . '<br>';
		return false;
	} else {
		echo "You are now eligible to donate plasma!" . '<br>';

		return true;
	}
}

function plateletsEligible($days, $times)
{
	$daysLeft = 7  - $days;
	$timesLeft = 24  - $times;

	if ($days < 7  && $times <= 24 )
	{
		echo "You will be eligible to donate platelets in <strong>$daysLeft days</strong>." . '<br>';
		echo "You may donate platelets <strong>$timesLeft</strong> more time(s) this year." . '<br>';
		return false;
	} else if ($days < 7  && $times >= 24 ) {
		echo "You have filled your platelets donation quota for the year." . '<br>';
		return false;
	} else if ($days >= 7  && $times >= 24 ) {
		echo "You have filled your platelets donation quota for the year." . '<br>';
		return false;
	} else {
		echo "You are now eligible to donate platelets!" . '<br>';
		return true;
	}
}

function rbcEligible($days, $times)
{
	$daysLeft = 113 - $days;
	$timesLeft = 3 - $times;

	if ($days < 113 && $times <= 3)
	{
		echo "You will be eligible to donate Double Red Cells in <strong>$daysLeft days</strong>." . '<br>';
		echo "You may donate Double Red Cells <strong>$timesLeft</strong> more time(s) this year." . '<br>';
		return false;
	} else if ($days < 113 && $times >= 3) {
		echo "You have filled your Double Red Cells donation quota for the year." . '<br>';
		return false;
	} else if ($days >= 113 && $times >= 3) {
		echo "You have filled your Double Red Cells donation quota for the year." . '<br>';
		return false;
	} else {
		echo "You are now eligible to donate double red blood cells!" . '<br>';
		return true;
	}
}

function wholeEligible($days)
{
	$daysLeft = 56 - $days;

	if ($days >= 56)
	{
		echo "You are now eligible to donate whole blood!" . '<br>';
		return true;
	}
	else
	{
		echo "You will be eligible to donate whole blood in <strong>$daysLeft days</strong>." . '<br>';
		return false;
	}
	
}


function plasmaSupply($locationInput, $eligibility, $mysqli)
{
	$location = $locationInput;

	if ($eligibility == true)
	{
		$response = NULL;

		if(!$check = $mysqli->prepare("SELECT days_plasma
		FROM supply WHERE location=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
		} 

		else {
			$check->bind_param("s", $location);
			if(!$check->execute()) {
				echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
			} 
			else {
				if ($response < 6) {

					echo $location . " is low on plasma!";
					return true;
				}
			}
		}


	}
	else
	{
		return false;	
	}	
}



function plateletSupply($locationInput, $eligibility, $mysqli)
{
		$location = $locationInput;

	if ($eligibility == true)
	{
		$response = NULL;

		if(!$check = $mysqli->prepare("SELECT days_platelets
		FROM supply WHERE location=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
		} 

		else {
			$check->bind_param("s", $location);
			if(!$check->execute()) {
				echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
			} 
			else {
				if ($response < 6) {

					echo $location . " is low on plasma!";
					return true;
				}
			}
		}

	}
	else
	{
		return false;	
	}	
}

function bloodSupply($locationInput, $eligibility, $mysqli)
{
		$location = $locationInput;

	if ($eligibility == true)
	{
		$response = NULL;

		if(!$check = $mysqli->prepare("SELECT days_whole
		FROM supply WHERE location=?")) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
		} 

		else {
			$check->bind_param("s", $location);
			if(!$check->execute()) {
				echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
			} 
			else {
				if ($response < 6) {

					echo $location . " is low on red blood cells!";
					return true;
				}
			}
		}
	}
	else
	{
		return false;	
	}	
}

?>

<!DOCTYPE html>
<html>
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

   		 <title>Priority 2 - Eligibility Countdowns</title>

  </head>
  <link rel="stylesheet" type="text/css" href="priority2.css">
    <body>
        <div class="container">
           <a href="../Group1/logout.php">LOGOUT</a> | <a href = "../Group1/userProfile.php">PROFILE PAGE</a> | Hello <?php echo "$fname [$username | $userID]"; ?>
        </div>  
    	<div id="header"><h1>Countdown to Next Donation:</h1></div>

	  	<div id=countdown>

	  		<?php
				$id = $_SESSION['userID'];

				$numDays = getLastPlasma($id, $mysqli);
				$numTimes = getVisitsPlasma($id, $mysqli);
				$eligibility = plasmaEligible($numDays, $numTimes);
				plasmaSupply($location, $eligibility, $mysqli);
			?>

		</div>
		<div id="break"><br><br></div>

		<div id="countdown">

			<?php
				$numDays = getLastPlatelets($id, $mysqli);
				$numTimes = getVisitsPlatelets($id, $mysqli);
				$eligibility = plateletsEligible($numDays, $numTimes);
				plateletSupply($location, $eligibility, $mysqli);
			?>

		</div>
		<div id="break"><br><br></div>

		<div id="countdown">

			<?php
				$numDays = getLastDoubleRBC($id, $mysqli);
				$numTimes = getVisitsDRBC($id, $mysqli);
				$eligibility = rbcEligible($numDays, $numTimes);
				bloodSupply($location, $eligibility, $mysqli);
			?>

		</div>
		<div id="break"><br><br></div>

		<div id="countdown">

			<?php
				$numDays = getLastWhole($id, $mysqli);
				$eligibility = wholeEligible($numDays);
				bloodSupply($location, $eligibility, $mysqli);
			?>

		</div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>

	</body>
</html>