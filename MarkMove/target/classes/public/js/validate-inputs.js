$(document).ready(function(){
    $("#username").change(function(){
            var inputLength = $("#username").val().length;
            if (inputLength > 2) {
                $.post("searchData.php", 
            {
                nickname: $("#username").val()
            }, function(data, status){
                if (data == "true") {
                    $("#ok-nickname-sign").css("display","none");
                     $("#taken-nickname-alert").html($("#taken-nickname-alert").html().replace("Nickname should be at least 3 letters long",
                      "There is already user with that nickname"));
                    $("#taken-nickname-alert").css("display","block");
                    $('button[type="submit"]').prop('disabled', true); 
                }
                else{
                    $("#taken-nickname-alert").css("display","none");
                    $("#ok-nickname-sign").css("display","block");
                    $('button[type="submit"]').prop('disabled', false); 
                }
            });  
            }
            else{
                $("#ok-nickname-sign").css("display","none");
                $("#taken-nickname-alert").html($("#taken-nickname-alert").html().replace("There is already user with that nickname",
                 "Nickname should be at least 3 letters long"));
                $("#taken-nickname-alert").css("display","block");
                $('button[type="submit"]').prop('disabled', true); 
            }           
    });

$("#password").change(function(){
        var passwordLength = $("#password").val().length;
        if (passwordLength > 5) {
            $("#ok-password-sign").css("display","block");
            $("#invalid-password-alert").css("display","none");
            $('button[type="submit"]').prop('disabled', false); 
        }else{
            $("#ok-password-sign").css("display","none");
            $("#invalid-password-alert").css("display","block");
            $('button[type="submit"]').prop('disabled', true); 
        }
    });

$("#confirm-password").change(function(){
    var password = $("#password").val();
    var confirm_password = $("#confirm-password").val();
    if (password == confirm_password) {
        $("#invalid-confirm-password-alert").css("display", "none");
        $("#ok-confirm-password-sign").css("display", "block");
        $('button[type="submit"]').prop('disabled', false); 
    }
    else{
        $("#ok-confirm-password-sign").css("display", "none");
        $("#invalid-confirm-password-alert").css("display", "block");     
        $('button[type="submit"]').prop('disabled', true); 
    }
});

$("#age").change(function(){
    var astext = $("#age").val();
    var age = parseInt(astext, 10);
    if (age < 7) {
        $("#invalid-age-alert").css("display","block");
        $('button[type="submit"]').prop('disabled', true); 
    }
    else{
        $("#invalid-age-alert").css("display","none");
        $('button[type="submit"]').prop('disabled', false); 
    }
});

});


        


    