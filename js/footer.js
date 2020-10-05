$(document).ready(function() {
    $("#newletterBtn").click(function() {
        var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if ($("#newletterEmail").val() === "") {
            alert("Enter your Email?");
        } else if (!patt.test($("#newletterEmail").val())) {
            alert("Invalid Email!");
        } else {
            $.get("newletter-process.php?email=" + $("#newletterEmail").val(), function(response) {
                alert(response);
            });
        }
    });
});