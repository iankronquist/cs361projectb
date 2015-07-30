function setInputDate(stringDate, inputTagName) {

    if(stringDate == "")
        return;
    
    var dd = stringDate.slice(3,5);
    var mm = stringDate.slice(0,2);
    var yyyy = stringDate.slice(6,10);
    var fDate = yyyy + "-" + mm + "-" + dd;
    
    $("input[name='" + inputTagName +"']").val(fDate);
};

$(document).ready( function() {
    
     
    //fields
    $(".updateUserFields").keyup( function () {
        var postData = {};
        postData[$(this).attr("name")] = $(this).val();
        console.log(postData);
        $.post("api_updateUserData.php", postData);
    })
    
    $(".updateBloodInfo").change( function () {
        var postData = {};
        postData[$(this).attr("name")] = $(this).val();
        console.log(postData);
        $.post("api_updateUserData.php", postData);
    })
    
    
    

    //login
    $("#loginButton").click(function() {
        $(".login-error").empty();
        
        //js validation
        if($("#l_username").val() == "" || $("#l_password").val() == "") {
            var str = "<div class='alert alert-warning' role='alert'>" +
                        "All fields are required. </div>";
            
            $(str).appendTo(".login-error");
            return false;
        } else {
            //send post data
            $.post( $("#login-form").attr("action"),
                    $("#login-form :input").serializeArray(),
                    function(data) {
                        var result = jQuery.parseJSON(data);
                        if(result["status"] == "Success") {
                            window.location.href = "userProfile.php";   
                        } else {
                            var str = "<div class='alert alert-warning' role='alert'>";
                            $.each(result["messages"], function(i, val){
                                console.log(val);
                                str = str + val + "</br>";
                            });
                            
                            str = str + "</div>";
                            $(str).appendTo(".login-error");
                            return false;
                        }
                    });
        }
        return false;
        
    });
    
    
    
    
    
    //handle registration form
    $("#registerButton").click(function() {
        $(".registration-error").empty();
        
        //js validation
        if($("#r_username").val() == "" || $("#r_password").val() == "" || $("r_fname").val() == "" || $("r_lname").val() == "") {
            var str = "<div class='alert alert-danger' role='alert'>" +
                        "All fields are required. </div>";
            
            $(str).appendTo(".registration-error");
            return false;
        } else {
            //send post data
            $.post( $("#registration-form").attr("action"),
                    $("#registration-form :input").serializeArray(),
                    function(data) {
                        var result = jQuery.parseJSON(data);
                        if(result["status"] == "Success") {
                            window.location.href = "userProfile.php";   
                        } else {
                            var str = "<div class='alert alert-danger' role='alert'>";
                            $.each(result["messages"], function(i, val){
                                console.log(val);
                                str = str + val + "</br>";
                            });
                            
                            str = str + "</div>";
                            $(str).appendTo(".registration-error");
                            return false;
                        }
                    });
        }
        return false;
        
    });
    
});