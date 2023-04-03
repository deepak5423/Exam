$(document).ready(function () {

    $("#submit").on("click", function (e) {
        e.preventDefault();
        var vehicleNumber = $("#vehicleNum").val();
        var vehicleType = $("#type").val();
        $.ajax({
            url: "booking.php",
            type: "POST",
            data: {
                vehicleNumber: vehicleNumber,
                vehicleType: vehicleType,
            },
            success: function (data) {
                $("#error").html(data);
                $("#submit").trigger("reset");
            },
            });
          
    });

    $("#relese").on("click", function (e) {
        e.preventDefault();
        var vehicleNumber = $("#vehicleNum").val();
        var vehicleType = $("#type").val();
        $.ajax({
            url: "Release.php",
            type: "POST",
            data: {
                vehicleNumber: vehicleNumber,
                vehicleType: vehicleType,
            },
            success: function (data) {
                $("#error").html(data);
                $("#Rel").trigger("reset");
            },
            });
          
    });


});