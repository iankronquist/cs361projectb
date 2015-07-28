<?php
ini_set('display_errors', 'On');
include 'dbinclude.php';
/*
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'kdutt';
*/

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
		echo "You may donate plasma $timesLeft more times this year."
		return false;
	} else if ($days < 28 && $times >= 13) {
		echo "You have filled your plasma donation quota for the year."
		return false;
	} else if ($days >= 28 && $times >= 13) {
		echo "You have filled your plasma donation quota for the year."
		return false;
	} else {
		echo "You are now eligible to donate plasma!";
		return true;
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
/*$id = 1;

if(!$check = $mysqli->prepare("SELECT DATEDIFF(CURDATE(), last_plasma_date) 
	FROM users WHERE id=1")) {
	echo "Prepare failed: (" . $check->errno . ")" . $check->error;
} 

if(!$check->execute()) {
	echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
}

$retDate = NULL;
if (!$check->bind_result($retDate)) {
	echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
} else {
	echo '<h2>Success</h2>';
}

//echo '<select id="LastDate" name="LastDate" required>';

while ($check->fetch()) {
	echo '<h2>Last plasma donation date: ' . "$retDate" . '</h2>';
}

//echo '<h2>Last plasma donation date: "$retDate" </h2>';
*/
?>