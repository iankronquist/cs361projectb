<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration</title>

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
    <div class="container">
        <h1>Login & Registration</h1>
    </div>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"> Login Form </div>
            <div class="panel-body">
                <div class="login-error" id="login-error"></div>
                
                <form method="POST" action="validate_login.php" id="login-form">
                    <div class="form-group">
                    
                    
                    <div class="input-group">
                        <span class="input-group-addon">Username:</span>
                        <input type="text" class="form-control" id="l_username" name="l_username"/>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">Password:</span>
                        <input type="password" class="form-control"  id="l_password" name="l_password"/>
                    </div>

                    <input type="submit" class="btn btn-default" value="Log In" id="loginButton" name="l_submit"/>
                </div></form>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"> Registration Form </div>
            <div class="panel-body">
                <div class="registration-error" id="registration-error"></div>
                
                <form method="POST" action="validate_registration.php" id="registration-form">
                    <div class="form-group">
                    
                    
                    <div class="input-group">
                        <span class="input-group-addon">Username:</span>
                        <input type="text" class="form-control" id="r_username" name="r_username"/>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">Password:</span>
                        <input type="password" class="form-control"  id="r_password" name="r_password"/>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">First Name:</span>
                        <input type="text" class="form-control" id="r_fname" name="r_fname"/>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">Last Name:</span>
                        <input type="text" class="form-control"  id="r_lname" name="r_lname"/>
                    </div>

                    <input type="submit" class="btn btn-default" value="Register" id="registerButton" name="r_submit"/>
                </div></form>
            </div>
        </div>
    </div>
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    
</body>
</html>