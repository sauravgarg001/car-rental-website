$(document).ready(function() {
    $("#login").click(function() {
        var email = $("#email").val();
        var password = $("#password").val();
        $.get("login-process.php?email=" + email + "&password=" + password, function(response) {
            response = response.trim();
            if (response == "done") {
                history.back();
            } else {
                alert(response);
            }
        });

    });
    //----------------------------------------------------
    $("#btnForgotPassword").click(function() {
        $.get("email-process.php?email=" + $("#email").val(), function(response) {
            if (response === "exists") {
                $.get("forgot-password-process.php?email=" + $("#email").val(), function(response) {
                    response = response.trim();
                    if (response.startsWith("OTP Sent")) {
                        setTimer(5);
                        $("#msg").html(response);
                        $("#forgotPasswordModal").modal("show");
                    } else
                        alert("Try again unable to sent OTP");
                });
            } else {
                alert("Please enter valid email");
            }
        });
    });
    //----------------------------------------------------
    $('#forgotPassword').on('keyup keypress focus', function(e) {
        $("#fcnpassword").val("").removeClass("is-valid");
        var patt = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (patt.test($(this).val())) {
            $("#forgotPassword_tooltip").css("display", "none");
            $(this).removeClass("is-invalid").addClass("is-valid");
        } else {
            $("#forgotPassword_tooltip").css("display", "block");
            $(this).removeClass("is-valid").addClass("is-invalid");
        }
    });
    //--------------------------------------------------
    $("#forgotPassword").focusout(function() {
        $("#forgotPassword_tooltip").css("display", "none");
    });
    //---------------------------------------------------
    $("#changePassword").click(function() {
        if ($("#forgotPassword").hasClass("is-valid")) {

            var password = $("#forgotPassword").val();
            var otp = $("#otp").val();
            var email = $("#email").val();

            $.get("changepassword-process.php?password=" + password + "&otp=" + otp + "&email=" + email, function(response) {
                response = response.trim();
                if (response.startsWith("Password")) {
                    $("#forgotPasswordModal").modal("hide");
                    alert(response);
                    window.location.href = "login.php";
                    return;
                }
                $("#otp_feedback").html(response);
                $("#otp").addClass("is-invalid");
            });
        }
    });
    //--------------------------------------------------
    function setTimer(minutes) {
        document.getElementById('timer').innerHTML =
            minutes + ":" + 00;
        startTimer();

        function startTimer() {
            var presentTime = document.getElementById('timer').innerHTML;
            var timeArray = presentTime.split(/[:]+/);
            var m = timeArray[0];
            var s = checkSecond((timeArray[1] - 1));
            if (s == 59) {
                m = m - 1;
            }
            //if(m<0){alert('timer completed')}

            document.getElementById('timer').innerHTML =
                m + ":" + s;
            if (m == 0 && s == 0) {
                $("#forgotPasswordModal").modal("hide");
                alert("Timeout for OTP, Try Again after Sometime.");
                window.location.href = "logout-process.php";
                return;
            }
            setTimeout(startTimer, 1000);
        }

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {
                sec = "0" + sec;
            } // add zero in front of numbers < 10
            if (sec < 0) {
                sec = "59";
            }
            return sec;
        }
    }

});