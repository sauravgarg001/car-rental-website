$(document).ready(function() {
    function load() { //Empty fields on start
        $("#email").val("");
        $("#name").val("");
        $("#message").val("");
        $("#subject").val("");
        $("#name").focus();
    }
    load();
    //---------------------------------------------------
    $("#sendQuery").click(function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#subject").val();
        var message = $("#message").val();

        $.get("query-process.php?name=" + name + "&email=" + email + "&subject=" + subject + "&message=" + message, function(response) {
            alert(response);
        });
    });
});