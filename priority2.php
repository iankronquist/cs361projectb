<?php
ini_set('display_errors', 'On');
// include 'dbinclude.php';

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'project_b';


$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
}

echo '<h1>Database Testing Document</h1>';

function getLastPlasma($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT DATEDIFF(CURDATE(), last_plasma_date) 
		FROM users WHERE id=?")) {
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
				echo '<h2>Days since last PLASMA donation: ' . "$retDate" . '</h2>';
				$retDate;
			}
		}
	}

	return $retDate;

}

function getLastPlatelets($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT DATEDIFF(CURDATE(), last_platelets_date) 
		FROM users WHERE id=?")) {
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
				echo '<h2>Days since last PLATELET donation: ' . "$retDate" . '</h2>';
				$retDate;
			}
		}
	}

	return $retDate;

}

function getLastDoubleRBC($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT DATEDIFF(CURDATE(), last_double_rbc_date) 
		FROM users WHERE id=?")) {
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
				echo '<h2>Days since last DOUBLE RBC donation: ' . "$retDate" . '</h2>';
				$retDate;
			}
		}
	}

	return $retDate;

}

function getLastWhole($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT DATEDIFF(CURDATE(), last_whole_date) 
		FROM users WHERE id=?")) {
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
				echo '<h2>Days since last WHOLE donation: ' . "$retDate" . '</h2>';
				$retDate;
			}
		}
	}

	return $retDate;

}

function getVisitsPlasma($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT VisitPlasma FROM users WHERE id=?")) {
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
				echo '<h2>Number of visits' . "$numVisits" . '</h2>';
				$numVisits;
			}
		}
	}

	return $numVisits;
}

function getVisitsPlatelets($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT VisitPlatelet FROM users WHERE id=?")) {
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
				echo '<h2>Number of visits' . "$numVisits" . '</h2>';
				$numVisits;
			}
		}
	}

	return $numVisits;
}

function getVisitsDRBC($arg_1, $mysqli)
{
	$id = $arg_1;

	if(!$check = $mysqli->prepare("SELECT VisitDRBC FROM users WHERE id=?")) {
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
				echo '<h2>Number of visits' . "$numVisits" . '</h2>';
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
		echo "You will be eligible to donate plasma in $daysLeft days.";
		echo "You may donate plasma $timesLeft more times this year.";
		return false;
	} else if ($days < 28 && $times >= 13) {
		echo "You have filled your plasma donation quota for the year.";
		return false;
	} else if ($days >= 28 && $times >= 13) {
		echo "You have filled your plasma donation quota for the year.";
		return false;
	} else {
		echo "You are now eligible to donate plasma!";
		return true;
	}
}

function plateletsEligible($days, $times)
{
	$daysLeft = 7  - $days;
	$timesLeft = 24  - $times;

	if ($days < 7  && $times <= 24 )
	{
		echo "You will be eligible to donate platelets in $daysLeft days.";
		echo "You may donate platelets $timesLeft more times this year.";
		return false;
	} else if ($days < 7  && $times >= 24 ) {
		echo "You have filled your platelets donation quota for the year.";
		return false;
	} else if ($days >= 7  && $times >= 24 ) {
		echo "You have filled your platelets donation quota for the year.";
		return false;
	} else {
		echo "You are now eligible to donate plasma!";
		return true;
	}
}

function rbcEligible($days, $times)
{
	$daysLeft = 113 - $days;
	$timesLeft = 3 - $times;

	if ($days < 113 && $times <= 3)
	{
		echo "You will be eligible to donate Double Red Cells in $daysLeft days.";
		echo "You may donate Double Red Cells $timesLeft more times this year.";
		return false;
	} else if ($days < 113 && $times >= 3) {
		echo "You have filled your Double Red Cells donation quota for the year.";
		return false;
	} else if ($days >= 113 && $times >= 3) {
		echo "You have filled your Double Red Cells donation quota for the year.";
		return false;
	} else {
		echo "You are now eligible to donate plasma!";
		return true;
	}
}

function wholeEligible($days)
{
	$daysLeft = 56 - $days;

	if ($days >= 56)
	{
		echo "You are now eligible to donate whole blood!";
		return true;
	}
	else
	{
		echo "You will be eligible to donate whole blood in $daysLeft days.";
		return false;
	}
	
}

$id = 1;

$numDays = getLastPlasma($id, $mysqli);

echo "Returned date: $numDays";
$numDays = getLastPlatelets($id, $mysqli);

echo "Returned date: $numDays";
$numDays = getLastDoubleRBC($id, $mysqli);

echo "Returned date: $numDays";
$numDays = getLastWhole($id, $mysqli);

echo "Returned date: $numDays";

?>
