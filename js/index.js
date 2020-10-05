$(document).ready(function() {
    $(".isNull").on('change blur focus', function() {
        if ($(this).val() === "") {
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid");
        }
    });
});