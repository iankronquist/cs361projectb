<?php
    ini_set('display_errors', 'On');

    require_once 'priority1.php';

class PriorityOne extends \PHPUnit_Framework_TestCase
{
    /**********************************************************************************
    * AGE TESTS
    ***********************************************************************************/
    
    public function test_UpdateAgeValidInput()
    {
        //set up values
        $age_value = 22;
        $id = 1;
        
        //get result
        $result = updateUser($conn, 'age', $age_value, $id);
        
        //compare result to expected
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateAgeInvalidInput()
    {
       
        $age_value = 22;
        $id = 'fail';
        
        $result = updateUser($conn, 'age', $age_value, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    //update the sex
    public function test_UpdateSexValidInput()
    {
       
        $sex_value = 'Male';
        $id = 1;
        
        $result = updateUser($conn, 'sex', $sex_value, $id);
        
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateSexInvalidInput()
    {
       
        $sex_value = 'Male';
        $id = 'fail';
        
        $result = updateUser($conn, 'sex', $sex_value, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    

    /**********************************************************************************
    * HEIGHT TESTS
    ***********************************************************************************/
    
    public function test_UpdateHeightValidInput()
    {
       
        $height_value = 200;
        $id = 1;
        
        $result = updateUser($conn, 'height', $height_value, $id);
        
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateHeightInvalidInput()
    {
       
        $height_value = 'fail';
        $id = 1;
        
        $result = updateUser($conn, 'height', $height_value, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateHeightInvalidInputZero()
    {
       
        $height_value = 0;
        $id = 1;
        
        $result = updateUser($conn, 'height', $height_value, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateHeightInvalidInputNegative()
    {
       
        $height_value = -1;
        $id = 1;
        
        $result = updateUser($conn, 'height', $height_value, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    /**********************************************************************************
    * WEIGHT TESTS
    ***********************************************************************************/
    
    public function test_UpdateWeightValidInput()
    {
       
        $weight_value = 200;
        $id = 1;
        
        $result = updateUser($conn, 'weight', $weight_value, $id);
        
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateWeightInvalidInput()
    {
       
        $weight_value = 'fail';
        $id = 1;
        
        $result = updateUser($conn, 'weight', $weight_value, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateWeightInvalidInputZero()
    {
       
        $weight_value = 0;
        $id = 1;
        
        $result = updateUser($conn, 'weight', $weight_value, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateWeighttInvalidInputNegative()
    {
       
        $weight_value = -1;
        $id = 1;
        
        $result = updateUser($conn, 'weight', $weight_value, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    /**********************************************************************************
    * LOCATION TESTS
    ***********************************************************************************/
    public function test_UpdateLocationValidInput()
    {
        $location_value = 'NY';
        $id = 1;
        
        $result = updateUser($conn, 'location', $location_value, $id);
        
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    
    public function test_UpdateLocationValidInputNA()
    {
        $location_value = 'N/A';
        $id = 1;
        
        $result = updateUser($conn, 'location', $location_value, $id);
        
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateLocationInvalidInputNum()
    {
        $location_value = 123;
        $id = 1;
        
        $result = updateUser($conn, 'location', $location_value, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    /**********************************************************************************
    * LAST PLASMA TEST
    ***********************************************************************************/
    
    public function test_UpdatePlasmaValidInput()
    {
        $blood_date = '2015-06-20'; // YYYY-MM-DD
        $id = 1;
        
        $result = updateUser($conn, 'last_plasma', $blood_date, $id);
        
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdatePlasmaInvalidInput()
    {
        $blood_date = '2015-06-96';
        $id = 1;
        
        $result = updateUser($conn, 'last_plasma', $blood_date, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    /**********************************************************************************
    * LAST PLATELETS TEST
    ***********************************************************************************/
    
    public function test_UpdatePlateletsValidInput()
    {
        $blood_date = '2015-06-20'; // YYYY-MM-DD
        $id = 1;
        
        $result = updateUser($conn, 'last_platelets', $blood_date, $id);
        
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdatePlateletsInvalidInput()
    {
        $blood_date = '2015-06-96';
        $id = 1;
        
        $result = updateUser($conn, 'last_platelets', $blood_date, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }

    /**********************************************************************************
    * LAST DOUBLE RED BLOOD CELLS TEST
    ***********************************************************************************/
    
    public function test_UpdateDRBloodCellsValidInput()
    {
        $blood_date = '2015-06-20'; // YYYY-MM-DD
        $id = 1;
        
        $result = updateUser($conn, 'last_drbloodcells', $blood_date, $id);
        
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdatePlateletsInvalidInput()
    {
        $blood_date = '2015-06-96';
        $id = 1;
        
        $result = updateUser($conn, 'last_drbloodcells', $blood_date, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
    /**********************************************************************************
    * LAST WHOLE BLOOD TEST
    ***********************************************************************************/
    
    public function test_UpdateWholeBloodValidInput()
    {
        $blood_date = '2015-06-20'; // YYYY-MM-DD
        $id = 1;
        
        $result = updateUser($conn, 'last_wholeblood', $blood_date, $id);
        
        $expected = true;
        $this->assertEquals($result, $expected);
    }
    
    public function test_UpdateWholeBloodInvalidInput()
    {
        $blood_date = '2015-06-96';
        $id = 1;
        
        $result = updateUser($conn, 'last_wholeblood', $blood_date, $id);
        
        $expected = false;
        $this->assertEquals($result, $expected);
    }
    
}

?>