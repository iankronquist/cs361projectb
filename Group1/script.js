$(document).ready( function() {
    
    $(".updateUserFields").keyup( function () {
        var postData = {};
        postData[$(this).attr("name")] = $(this).val();
        $.post("priority1.php", postData);
    })

    
}