<?php
ini_set('display_errors', 'On');

/* to be replaced with name of appropriate document */
require_once 'notifications.php';

		/* To be replaced with appropriate info */
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'project_b';

class NotificationsTest extends \PHPUnit_Framework_TestCase
{

	public function testGetNotifications()
	{
		global $host, $user, $pass, $db;

		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = getLastPlasma(0, $mysqli);
		$expected = "Your donation of 2 liters ofblood helped save a life! <br>Your donation of 4 liters ofblood helped save a life! <br>"
		$this->assertEquals($expected, $actual);
		mysqli_close($mysqli);
	}
}

?>
