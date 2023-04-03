<?php
// Including nessary files.
require('Classes/SqlConnection.php');
require('Classes/ParkingBooking.php');


// Storing values in variables
$vehicleNumber = $_POST["vehicleNumber"];
$vehicleType = $_POST["vehicleType"];

// Creating an object of class SqlConnection().
$connection = new SqlConnection();
$conn = $connection->getConnection();

$booking = new ParkingBooking($vehicleNumber, $vehicleType);
$query = $booking->setValues();
$request = mysqli_query($conn, $query);
if (!$request) {
    echo 'Error !';
} 
else {
    echo "Slot Booked sucessfully.";
}

?>