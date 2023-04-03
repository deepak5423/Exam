<?php
// Including nessary files.
require('Classes/SqlConnection.php');
require('Classes/Helper.php');

// Creating an object of class SqlConnection().
$connection = new SqlConnection();
$conn = $connection->getConnection();

$booking = new Helper;
$query = $booking->fetchAllValues();
$request = mysqli_query($conn, $query);
if (!$request) {
    echo 'Error !';
} 
else {
    echo "Slot Booked sucessfully.";
}

?>