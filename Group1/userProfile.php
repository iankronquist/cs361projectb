
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
        
        <script src="script.js"></script>
        
    </head>
    <body>
        <div class="container">
           PROFILE PAGE 
        </div>  
        
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"> BAsic User Info </div>
                <div class="panel-body">
                    
                    <form>
                        <div class="form-group">
                            
                            <div class="input-group">
                                <span class="input-group-addon">Age:</span>
                                <input type="number" class="form-control" min="16" max="150" name="age"/>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Height:</span>
                                <input type="number" class="form-control" min="0" max="9999" name="height"/>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Weight:</span>
                                <input type="number" class="form-control" min="0" max="9999" name="weight"/>
                            </div>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Location:</span>
                                    <select class="form-control" name="location">
                                        <option value="">N/A</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DC">District of Columbia</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="IA">Iowa</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MD">Maryland</option>
                                        <option value="ME">Maine</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MT">Montana</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NY">New York</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VA">Virginia</option>
                                        <option value="VT">Vermont</option>
                                        <option value="WA">Washington</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
            
            <!----- BLOOD INFO -->
            <div class="panel panel-default">
                <div class="panel-heading"> Blood Info </div>
                <div class="panel-body"> 
                        <div class="input-group">
                            <span class="input-group-addon">Last Plasma:</span>
                            <input type="number" class="form-control" min="16" max="150" name="last_plasma"/>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">Last Platelets:</span>
                            <input type="number" class="form-control" min="0" max="9999" name="last_platelets"/>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">Last DR Blood Cells:</span>
                            <input type="number" class="form-control" min="0" max="9999" name="last_drbloodcells"/>
                        </div>
                    
                        <div class="input-group">
                            <span class="input-group-addon">Last Whole Blood:</span>
                            <input type="number" class="form-control" min="0" max="9999" name="last_wholeblood"/>
                        </div>
                </div>
                
            </div>
                    
                
            
        </div>  
        

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>