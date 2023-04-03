<?php
require('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Avability</title>
</head>
<body>
    <section>
        <div class='container'>
            <table class='bordert'>
                <tr style='font-size:40px;padding:20px;'>
                    <th style='padding:20px;'> Vehicle Type </th>
                    <th style='padding:20px;'> 2-wheeler </th>
                    <th style='padding:20px;'> 4-wheeler </th>
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
                        $queryTwo = $booking->fetchTwoWheeler();
                        $twoWheeler = mysqli_query($conn, $queryTwo);
    
                        $queryFour = $booking->fetchFourWheeler();
                        $fourWheeler = mysqli_query($conn, $queryFour);
                    ?>
                    <td style="padding:20px;"><h3>Available Slots</h3></td>
                    <td style="padding:20px;"><?php echo (100 - mysqli_num_rows($twoWheeler)); ?></td>
                    <td style="padding:20px;"><?php echo (100 - mysqli_num_rows($fourWheeler)); ?></td>
                </tr>
            </table>
        </div>
    </section>
</body>
</html>