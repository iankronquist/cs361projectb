<?php
ini_set('display_errors', 'On');

/* to be replaced with name of appropriate document */
require_once 'dbTesting.php';

		/* To be replaced with appropriate info */
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'kdutt';

class DateTest extends \PHPUnit_Framework_TestCase
{

/* TEST QUERY */
	public function testDaysSincePlasma()
	{
		global $host, $user, $pass, $db;

		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = getLastPlasma(1, $mysqli);

		$this->assertEquals(207, $actual);
	}

	public function testDaysSincePlatelets()
	{
		global $host, $user, $pass, $db;

		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = getLastPlatelets(1, $mysqli);

		$this->assertEquals(207, $actual);
	}

	public function testDaysSinceRBC()
	{
		global $host, $user, $pass, $db;

		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = getLastDoubleRBC(1, $mysqli);

		$this->assertEquals(207, $actual);
	}

	public function testDaysSinceWhole()
	{
		global $host, $user, $pass, $db;

		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = getLastWhole(1, $mysqli);

		$this->assertEquals(207, $actual);
	}

/*Test PLASMA 
	Eligibile: >= 28 days, < 13 times */
	public function testPlasmaEligible()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plasmaEligible(28, 12);
		$this->assertEquals(true, $actual);

	}

/* Fail times: any # days, >= 13 times */
	public function testPlasmaFailAnnual()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plasmaEligible(28, 13);
		$this->assertEquals(false, $actual);

	}

/* Fail days: < 28 days, any # times */
	public function testPlasmaFailDays()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plasmaEligible(27, 12);
		$this->assertEquals(false, $actual);

	}

/* Fail both: < 28 days, >= 13 times */
	public function testPlasmaFailBoth()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plasmaEligible(27, 13);
		$this->assertEquals(false, $actual);

	}

/* TEST PLATELETS 
 * Eligible: >= 7 days, < 24 times */
	public function testPlateletsEligible()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plateletsEligible(7, 23);
		$this->assertEquals(true, $actual);

	}

/* Fail times: any # days, >= 13 times */
	public function testPlateletsFailAnnual()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plateletsEligible(7, 24);
		$this->assertEquals(false, $actual);

	}

/* Fail days: < 7 days and any # times */
	public function testPlateletsFailDays()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plateletsEligible(6, 12);
		$this->assertEquals(false, $actual);

	}

/* Fail both: < 7 days, >= 24 times */
	public function testPlateletsFailBoth()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plateletsEligible(6, 24);
		$this->assertEquals(false, $actual);

	}

/* TEST DOUBLE RBC 
 * Eligible: >= 113 days, < 3 times */
	public function testRBCEligible()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = rbcEligible(113, 2);
		$this->assertEquals(true, $actual);

	}

/* Fail times: any # days, >= 3 times */
	public function testRBCFailAnnual()
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'kdutt';
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = rbcEligible(113, 3);
		$this->assertEquals(false, $actual);

	}

/* Fail days: < 113 days and any # times */
	public function testRBCFailDays()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = rbcEligible(112, 2);
		$this->assertEquals(false, $actual);

	}

/* Fail both: < 113 days, >= 3 times */
	public function testRBCFailBoth()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = rbcEligible(112, 3);
		$this->assertEquals(false, $actual);

	}

/* TEST WHOLE BLOOD 
 * Eligible: >= 56 days */
	public function testWholeEligible()
	{
		global $host, $user, $pass, $db;
		
		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = wholeEligible(56);
		$this->assertEquals(true, $actual);

	}

/* Fail days: < 56 days */
	public function wholeFailDays()
	{
		global $host, $user, $pass, $db;

		$mysqli = new mysqli($host, $user, $pass, $db);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
		}

		$actual = plateletsEligible(55);
		$this->assertEquals(false, $actual);

	}
}