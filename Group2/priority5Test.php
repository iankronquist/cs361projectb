<?php
ini_set('display_errors', 'On');

/* to be replaced with name of appropriate document */
require_once 'priority2.php';


		/* To be replaced with appropriate info */
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'testdb';

		// variables to pass to test functions

		$needyLocation = "California";
		$notNeedyLocation = "Oregon";

class DateTest extends \PHPUnit_Framework_TestCase
{
	// Tests when supply is low

	//When donor is eligible for plasma donation AND there is low supply
	public function testPlasmaSupply ()
	{
		global $host, $user, $pass, $db, $needyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plasmaSupply($needyLocation, true, $mysqli);

		$this->assertEquals(true, $actual);
	}

	//When donor is NOT eligible for plasma donation AND there is low supply
	public function testPlasmaNotSupply ()
	{
		global $host, $user, $pass, $db, $needyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plasmaSupply($needyLocation, false, $mysqli);

		$this->assertEquals(false, $actual);
	}

	//When donor is eligible for platlet donation AND there is low supply
	public function testPlateletSupply ()
	{
		global $host, $user, $pass, $db, $needyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plateletSupply($needyLocation, true, $mysqli);

		$this->assertEquals(true, $actual);
	}

	//When donor is NOT eligible for platlet donation AND there is low supply
	public function testPlateletNotSupply ()
	{
		global $host, $user, $pass, $db, $needyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plateletSupply($needyLocation, false, $mysqli);

		$this->assertEquals(false, $actual);
	}

	//When donor is eligible for blood donation AND there is low supply
	public function testBloodSupply ()
	{
		global $host, $user, $pass, $db, $needyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = bloodSupply($needyLocation, true, $mysqli);

		$this->assertEquals(true, $actual);
	}

	//When donor is NOT eligible for blood donation AND there is low supply
	public function testBloodNotSupply ()
	{
				global $host, $user, $pass, $db, $needyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = bloodSupply($needyLocation, false, $mysqli);

		$this->assertEquals(false, $actual);
	}


	// Tests for when there is ample supply

	//When donor is eligible for plasma donation BUT there is ample supply
	public function testPlasmaOverSupply ()
	{
		global $host, $user, $pass, $db, $notNeedyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plasmaSupply($notNeedyLocation, true, $mysqli);

		$this->assertEquals(false, $actual);
	}

	//When donor is NOT eligible for plasma donation AND there is ample supply
	public function testPlasmaNotOverSupply ()
	{
		global $host, $user, $pass, $db, $notNeedyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plasmaSupply($notNeedyLocation, false, $mysqli);

		$this->assertEquals(false, $actual);
	}

	//When donor is eligible for platelet donation AND there is ample supply
	public function testPlateletOverSupply ()
	{
		global $host, $user, $pass, $db, $notNeedyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plateletSupply($notNeedyLocation, true, $mysqli);

		$this->assertEquals(false, $actual);
	}

	//When donor is NOT eligible for platelet donation AND there is ample supply
	public function testPlateletNotOverSupply ()
	{
		global $host, $user, $pass, $db, $notNeedyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plateletSupply($notNeedyLocation, false, $mysqli);

		$this->assertEquals(false, $actual);
	}

	//When donor is eligible for blood donation AND there is ample supply
	public function testBloodOverSupply ()
	{
		global $host, $user, $pass, $db, $notNeedyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = bloodSupply($notNeedyLocation, true, $mysqli);

		$this->assertEquals(false, $actual);
	}

		//When donor is NOT eligible for blood donation AND there is ample supply
	public function testBloodNotOverSupply ()
	{
		global $host, $user, $pass, $db, $notNeedyLocation;


		$mysqli = new mysqli($host, $user, $pass, $db);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = bloodSupply($notNeedyLocation, false, $mysqli);

		$this->assertEquals(false, $actual);
	}


}

?>