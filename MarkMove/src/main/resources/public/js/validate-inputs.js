window.onload = function () {
    document.getElementById("password").onchange = validatePassword;
    document.getElementById("confirm-password").onchange = validatePassword;
    document.getElementById("username_id").onchange = checkUserNameIsFree;
    document.getElementById("email-input").onchange = checkUsersEmailIsFree;
}
function validatePassword(){
    var pass2=document.getElementById("confirm-password").value;
    var pass1=document.getElementById("password").value;
    if(pass1!=pass2){
        document.getElementById("confirm-password").setCustomValidity("Passwords Don't Match");
        $("#ok-password-sign").css("display", "none");
        $("#ok-confirm-password-sign").css("display", "none");
    }
    else{

        document.getElementById("confirm-password").setCustomValidity('');
        $("#ok-password-sign").css("display", "block");
        $("#ok-confirm-password-sign").css("display", "block");
    }
}

function checkUserNameIsFree() {
    var username = $("#username_id").val();
    $.get("register/check", {username: username}, function (isFree) {
        if (isFree == "false") {
            $("#username_error").text("There is already a User with that username!");
            $("#username_error").css("display", "block");
            $("#ok-nickname-sign").css("display", "none")
        }
        else {
            $("#username_error").css("display", "none")
            $("#ok-nickname-sign").css("display", "block");
        }
    });
}
function checkUsersEmailIsFree() {
    var username = $("#email-input").val();
    $.get("register/check", {email: username}, function (isFree) {
        if (isFree == "false") {
            $("#email_error").text("There is already a User with that email!");
            $("#email_error").css("display", "block");
            $("#ok-email-sign").css("display", "none")
        }
        else {
            $("#email_error").css("display", "none")
            $("#ok-email-sign").css("display", "block");
        }
    });
}

        


    