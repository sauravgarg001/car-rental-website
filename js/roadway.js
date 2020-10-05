$(document).ready(function() {
    $(".selectcar").click(function() {
        $(this).parents(".car").addClass('.active');
        $("#fareperkm").text($(this).parents(".car").find(".fareperkm").text());
        $("#fareperhour").text($(this).parents(".car").find(".fareperhour").text());
        $("#fareperstay").text($(this).parents(".car").find(".fareperstay").text());
        $("#carnumber").text($(this).parents(".car").find(".carnumber").text());
        var stayprice = $("#fareperstay").text() * $("#nights").text();
        $("#stayprice").text(stayprice)
        var hourprice = $("#fareperhour").text() * $("#hours").text();
        $("#hourprice").text(hourprice)
        var returnprice = $("#fareperkm").text() * $("#distance").text();
        $("#returnprice").text(returnprice)
        $("#total").text(hourprice + returnprice + stayprice);
    });
    $("#booknow").click(function() {
        if ($("#total").text() != "--") {
            if (confirm("Confirm")) {
                var pickupDate = $("#pickupDate").text();
                var pickupLocation = $("#pickupLocation").text();
                var dropoffDate = $("#dropoffDate").text();
                var dropoffLocation = $("#dropoffLocation").text();
                var carnumber = $("#carnumber").text();
                var total = $("#total").text();
                pickupDate = pickupDate.replace(" ", "%20");
                dropoffDate = dropoffDate.replace(" ", "%20");
                console.log("booknow-process.php?pickupDate=" + pickupDate + "&pickupLocation=" + pickupLocation + "&dropoffDate=" + dropoffDate + "&dropoffLocation=" + dropoffLocation + "&carnumber=" + carnumber + "&total=" + total);
                $.get("booknow-process.php?pickupDate=" + pickupDate + "&pickupLocation=" + pickupLocation + "&dropoffDate=" + dropoffDate + "&dropoffLocation=" + dropoffLocation + "&carnumber=" + carnumber + "&total=" + total, function(response) {
                    response = response.trim();
                    if (response == "done") {
                        location.href = "trips.php";
                    } else {
                        alert(response);
                    }
                });
            }
        }
    });
});