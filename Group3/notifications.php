<?php
$dbc = mysqli_connect('oniddb.cws.oregonstate.edu', 'hammarlp-db', 'MY PASSWORD IS NOT HERE', 'hammarlp-db') or
die('Error connecting to MySQL server.');


function getNotifications($id, $mysqli) {
	$notifications = ''
	// Get last login date

	$query = "SELECT last_login FROM p2_users WHERE '?'=id";
	if(!$check = $mysqli->prepare($query)) {
		echo "Prepare failed: (" . $check->errno . ")" . $check->error;
	} else {
		$check->bind_param("i", $id);
		if(!$check->execute()) {
			echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
		} else {
			$last_login = NULL;
			if (!$check->bind_result($last_login)) {
				echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
			}
			$last_login = $check->fetch();
			// Get all donations which have been used since the user last logged in.
			$query = "SELECT amount FROM donations WHERE '?'=id AND date_used > '?'";
			if(!$check = $mysqli->prepare($query)) {
				echo "Prepare failed: (" . $check->errno . ")" . $check->error;
			} else {
				$check->bind_param("i", $id);
				$check->bind_param("j", $last_login);
				if(!$check->execute()) {
					echo "Execute failed: (" . $mysqli->errno . ")" . $mysqli->error;
				} else {
					$single_donation = NULL;
					if (!$check->bind_result($single_donation)) {
						echo "Binding output parameters failed: (" . $check->errno . ")" . $check->error;
					}
					while ($check->fetch()) {
						$notifications .= "Your donation of $single_donation liters of blood helped save a life! <br>";
					}
				}

			}
		}
	}
	return $notifications

}

?>
