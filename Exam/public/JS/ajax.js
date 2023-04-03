$(document).ready(function () {

    $("#submit").on("click", function (e) {
        e.preventDefault();
        var vehicleNumber = $("#vehicleNum").val();
        var vehicleType = $("#type").val();
        $.ajax({
            url: "/generate",
            type: "POST",
            data: {
                vehicleNumber: vehicleNumber,
                vehicleType: vehicleType,
            },
            success: function (data) {
                $("#error").html(data);
                $("#submit").trigger("reset");
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
              }
        }); 
    });

    $("#relese").on("click", function (e) {
        e.preventDefault();
        var vehicleNumber = $("#vehicleNum").val();
        var vehicleType = $("#type").val();
        $.ajax({
            url: "/release",
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