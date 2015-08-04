<?php
    ini_set('display_errors', 'On');
    require_once('api_getBloodSupply.php');

class PriorityOne extends \PHPUnit_Framework_TestCase
{
    
    public function getConnection() {
        $dbhost = 'localhost';
        $dbname = 'testdb';
        $dbuser = 'root';
        $dbpass = '';

        //try to connect to database
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($conn->connect_errno) {
            echo "Failed to connect to database: (" . $conn->connect_errno . ") " . $conn->connect_error;
            console.log("error connecting to db");
            die("error");
        }
        
        return $conn;
    }
    
 
    /**********************************************************************************
    * VALID Test Cases
    ***********************************************************************************/

    public function test_validState1()
    {
        //set up values
        $state = "NY";
        
        //get result
        $result = getBloodSupply($this->getConnection(), $state);
        
        //compare result to expected
        $expected = array(1, "NY", 500, 500, 500, 500, 600, 500, 300, 500);
        $this->assertEquals($result, $expected);
    }
    
    public function test_validState2()
    {
        //set up values
        $state = "ny";
        
        //get result
        $result = getBloodSupply($this->getConnection(), $state);
        
        //compare result to expected
        $expected = array(1, "NY", 500, 500, 500, 500, 600, 500, 300, 500);
        $this->assertEquals($result, $expected);
    }
    public function test_validState3()
    {
        //set up values
        $state = "CA";
        
        //get result
        $result = getBloodSupply($this->getConnection(), $state);
        
        //compare result to expected
        $expected = array(3, "CA", 500, 500, 200, 500, 600, 500, 300, 500);
        $this->assertEquals($result, $expected);
    }
    public function test_validState4()
    {
        //set up values
        $state = "ca";
        
        //get result
        $result = getBloodSupply($this->getConnection(), $state);
        
        //compare result to expected
        $expected = array(3, "CA", 500, 500, 200, 500, 600, 500, 300, 500);
        $this->assertEquals($result, $expected);
    }
    
    /**********************************************************************************
    * INVALID Test Cases
    ***********************************************************************************/
    public function test_InvalidState1()
    {
        //set up values
        $state = "New York"; //accept only 2 letter representation
        
        //get result
        $result = getBloodSupply($this->getConnection(), $state);
        
        //compare result to expected
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    public function test_InvalidState2()
    {
        //set up values
        $state = "other String"; //accept only 2 letter representation
        
        //get result
        $result = getBloodSupply($this->getConnection(), $state);
        
        //compare result to expected
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    public function test_InvalidState3()
    {
        //set up values
        $state = 123; //accept only 2 letter representation
        
        //get result
        $result = getBloodSupply($this->getConnection(), $state);
        
        //compare result to expected
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    public function test_InvalidState4()
    {
        //set up values
        $state = null; //accept only 2 letter representation
        
        //get result
        $result = getBloodSupply($this->getConnection(), $state);
        
        //compare result to expected
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    public function test_InvalidState5()
    {
        //set up values
        $state = ""; //accept only 2 letter representation
        
        //get result
        $result = getBloodSupply($this->getConnection(), $state);
        
        //compare result to expected
        $expected = false;
        $this->assertEquals($result, $expected);
    }

}

?>