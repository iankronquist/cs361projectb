<?php
ini_set('display_errors', 'On');
require_once('connection.php');
if (session_status() === PHP_SESSION_NONE){session_start();}


if(isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    $username = $_SESSION['username'];
    $fname = $_SESSION['fname'];
    $userID = $_SESSION['userID'];
} else {
    header("Location: Registration.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
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
        
        
        
    </head>
    <body>
        
        <?php require_once('navbar.php') ?>
        
        <div class="container">
           <h4>Blood Supply Monitor</h4>
        </div>  
        
        <div class="container">
            <form method="GET" action="api_getBloodSupply.php" id="form_getBloodSupplyByState">
                <div class="form-group">
                  <label for="sel1">Select a State: </label>
                  <select class="form-control" id="select_stateSupply" name="state">
                    <option for="state" value="">States</option>
                    <option for="state" value="NY">NY</option>
                    <option for="state" value="CA">CA</option>
                    <option for="state" value="MD">MD</option>
                    <option for="state" value="VA">VA</option>
                    <option for="state" value="DC">DC</option>
                  </select>
                </div>
            </form>
        </div>
        
        <div class="container">
          <table class="table table-hover" id="info_bloodSupply">
                <tr> <td>State</td>         <td id="state_val">-</td> </tr>
                <tr> <td>Type A</td>        <td id="typeA_val">-</td> </tr>
                <tr> <td>Type B</td>        <td id="typeB_val">-</td> </tr>
                <tr> <td>Type AB</td>       <td id="typeAB_val">-</td> </tr>
                <tr> <td>Type O</td>        <td  id="typeO_val">-</td> </tr>
                <tr> <td>Wholeblood</td>    <td id="wholeblood_val">-</td> </tr>
                <tr> <td>Platelets</td>     <td id="platelets_val">-</td> </tr>
                <tr> <td>Double Red Bloodcell</td> <td id="drblood_val">-</td> </tr>
                <tr> <td>Plasma</td>         <td id="plasma_val">-</td> </tr>
          </table>
        </div>
        

        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>    
    </body>
</html>