<?php
// Including nessary files.
require('Classes/SqlConnection.php');
require('Classes/Helper.php');

// Storing values in variables
$vehicleNumber = $_POST["vehicleNumber"];
$vehicleType = $_POST["vehicleType"];

// Creating an object of class SqlConnection().
$connection = new SqlConnection();
$conn = $connection->getConnection();

$booking = new Helper;
$query = $booking->releaseVehicle($vehicleNumber, $vehicleType);
$request = mysqli_query($conn, $query);
if (!$request) {
    echo 'Not Available !';
} 
else {
    echo "Thankyou For using our Sevices.";
}

?>