<?php 
    require('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Ticket</title>
</head>

<body>
    <table class='bordert'>
        <tr style='font-size:40px;padding:20px;'>
            <th style='padding:20px;'> Slot number </th>
            <th style='padding:20px;'> Vehicle number </th>
            <th style='padding:20px;'> Time of entry </th>
            <th style='padding:20px;'> Time of exit </th>
            <th style='padding:20px;'> Status </th>
        </tr>
        <tr>
    
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
    //$row = $request->fetch_assoc();
    $row = $request -> fetch_all(MYSQLI_ASSOC);
    ?>
    <tr>
        <?php 
            for ($i = 0; $i < sizeof($row); $i++) {
        ?>
                <td style="padding:20px;"><?php echo $row[$i]['slotNumber']; ?></td>
                <td style="padding:20px;"><?php echo $row[$i]['VehicleNumber']; ?></td>
                <td style="padding:20px;"><?php echo $row[$i]['TimeOfEntry']; ?></td>
                <td style="padding:20px;"><?php echo $row[$i]['TimeOfExit']; ?></td>
                <td style="padding:20px;"><?php echo $row[$i]['Status']; ?></td>
    </tr>
    <?php
            }
    ?>
    </table>
</body>
</html>