$(document).ready(function() {
    function load() { //Empty fields on start
        $("#email").val("");
        $("#password").val("");
        $("#mobile").val("");
        $("#name").val("");
        $("#name").focus();
    }
    load();
    $("#email").focusout(function() {
        $("#email_feedback").css("display", "none");
    });
    //--------------------------------------------------
    $("#email").on('keyup keypress focus', function() {
        var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if ($(this).val() === "") {
            $("#email_feedback").css("display", "block").html("Enter your Email?");
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else if (!patt.test($(this).val())) {
            $("#email_feedback").css("display", "block").html("Invalid Email!");
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else {
            $.get("email-process.php?email=" + $(this).val(), function(response) {
                if (response === "exists") {
                    $("#email_feedback").css("display", "block").html("Already signed up with this email");
                    $("#email").removeClass("is-valid").addClass("is-invalid");
                } else {
                    $("#email").removeClass("is-invalid").addClass("is-valid");
                    $("#email_feedback").css("display", "none");
                }
            });
        }
    });
    //--------------------------------------------------
    $("#mobile").focusout(function() {
        $("#mobile_feedback").css("display", "none");
    });
    //--------------------------------------------------
    $("#mobile").on('keyup keypress focus', function() {
        var patt = /^[6-9]\d{9}$/;
        if ($(this).val() === "") {
            $("#mobile_feedback").css("display", "block").html("Enter your Phone Number?");
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else if (!patt.test($(this).val())) {
            $("#mobile_feedback").css("display", "block").html("Invalid Phone Number!");
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else {
            $.get("mobile-process.php?mobile=" + $(this).val(), function(response) {

                if (response === "exists") {
                    $("#mobile_feedback").css("display", "block").html("Already signed up with this phone number");
                    $("#mobile").removeClass("is-valid").addClass("is-invalid");
                } else {
                    $("#mobile").removeClass("is-invalid").addClass("is-valid");
                    $("#mobile_feedback").css("display", "none");
                }
            });
        }
    });
    //--------------------------------------------------
    $('#password').on('keyup keypress focus', function(e) {
        var patt = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (patt.test($(this).val())) {
            $("#password_feedback").css("display", "none");
            $(this).removeClass("is-invalid").addClass("is-valid");
        } else {
            $("#password_feedback").css("display", "block").html("Enter password with atleast: <br>1 capital letter <br>1 special character<br>1 digit <br>1 small letter <br>Total of 8 characters.");
            $(this).removeClass("is-valid").addClass("is-invalid");
        }
    });
    //--------------------------------------------------
    $("#password").focusout(function() {
        $("#password_feedback").css("display", "none");
    });
    //--------------------------------------------------
    $(".isNull").on('keyup keypress focus', function() {
        if ($(this).val() === "") {
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid");
        }
    });
    //---------------------------------------------------
    $("#signup").click(function() {
        if ($("#name").hasClass("is-valid") &&
            $("#email").hasClass("is-valid") &&
            $("#mobile").hasClass("is-valid") &&
            $("#password").hasClass("is-valid")) {
            var name = $("#name").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var password = $("#password").val();

            $.get("signup-process.php?name=" + name + "&email=" + email + "&mobile=" + mobile + "&password=" + password, function(response) {
                if (response == "Account Created Succesfully") {
                    location.href = "login.php";
                } else {
                    alert(response);
                }
            });

        } else {
            alert("Please Enter Required Fields");
        }
    });
});