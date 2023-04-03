<?php 
    require('header.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Release Vehicle</title>
</head>
<body class='bbody'>
    <div class="loginbox signup">
        <form method="post" id="Rel">
            <span id="error" style="color:red;"></span><br>
            <input type="text" name="vehicleNumber" placeholder="Vehicle Number" id="vehicleNum" />
            <select name="type" id="type">
                <option value="none" selected disabled hidden>Type Of Vehicle</option>
                <option value="2-wheeler">2-wheeler</option>
                <option value="4-wheeler">4 wheeler </option>
            </select>
            <input type="submit" value="Relese" id="relese" />
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="JS/ajax.js"></script>
</html>