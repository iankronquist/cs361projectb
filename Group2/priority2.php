<?php
ini_set('display_errors', 'On');
if (session_status() === PHP_SESSION_NONE){session_start();}

if(isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    $username = $_SESSION['username'];
    $fname = $_SESSION['fname'];
    $userID = $_SESSION['userID'];
} else {
    header("Location: Group1/Registration.php");
    exit();
}

// include 'dbinclude.php';

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
?>

<!DOCTYPE html>
<html>
  <head><title>Priority 2 - Eligibility Countdowns</title></head>
  <link rel="stylesheet" type="text/css" href="priority2.css">
    <body>
    	<div id="header"><h1>Countdown to Next Donation</h1></div>

	  	<div id=countdown>

	  		<?php
				$id = $_SESSION['userID'];

				$numDays = getLastPlasma($id, $mysqli);
				$numTimes = getVisitsPlasma($id, $mysqli);
				plasmaEligible($numDays, $numTimes);
			?>

		</div>
		<div id=break><br><br></div>

		<div id=countdown>

			<?php
				$numDays = getLastPlatelets($id, $mysqli);
				$numTimes = getVisitsPlatelets($id, $mysqli);
				plateletsEligible($numDays, $numTimes);
			?>

		</div>
		<div id=break><br><br></div>

		<div id=countdown>

			<?php
				$numDays = getLastDoubleRBC($id, $mysqli);
				$numTimes = getVisitsDRBC($id, $mysqli);
				rbcEligible($numDays, $numTimes);
			?>

		</div>
		<div id=break><br><br></div>

		<div id=countdown>

			<?php
				$numDays = getLastWhole($id, $mysqli);
				wholeEligible($numDays);
			?>

		</div>

	</body>
</html>