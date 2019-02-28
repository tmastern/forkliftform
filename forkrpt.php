<html>
<head>
<link rel="stylesheet" type="text/css" href="forkrpt.css" />
</head>
<h3 style="text-align: center;">Lift Truck Inspection Report</h3>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> src="forkrpt.js" defer></script>
<?php

require_once('../connect.php');

$query = "SELECT ID, Date, Name, Forklift, Hours, Brakes, Levers, Foot, Plate, Leaks, Cylinder, Electric, Mast, Broken, LightsMirrors, 
Seatbelt, Tires, AlarmHorn, Oil, Propane, Water, Charge, Comment FROM forkliftdata ORDER BY ID DESC";

$response = @mysqli_query($dbc, $query);


if($response){

    echo '<table ID="forkrpt" align="center"
    cellspacing="5" cellpadding="8">

    <tr><td align="center"><b>ID</b></td>
    <td align="center"><b>Date</b></td>
    <td align="center"><b>Operator</b></td>
    <td align="center"><b>Forklift ID</b></td>
    <td align="center"><b>Meter Hours</b></td>
    <td align="center"><b>Brakes</b></td>
    <td align="center"><b>Levers</b></td>
    <td align="center"><b>Foot</b></td>
    <td align="center"><b>Plate</b></td>
    <td align="center"><b>Leaks</b></td>
    <td align="center"><b>Cylinder</b></td>
    <td align="center"><b>Electric</b></td>
    <td align="center"><b>Mast</b></td>
    <td align="center"><b>Broken?</b></td>
    <td align="center"><b>Lghts/Mrs</b></td>
    <td align="center"><b>Seatbelt</b></td>
    <td align="center"><b>Tires</b></td>
    <td align="center"><b>Horn/Alarm</b></td>
    <td align="center"><b>Oil</b></td>
    <td align="center"><b>Propane</b></td>
    <td align="center"><b>Water</b></td>
    <td align="center"><b>Charge</b></td>
    <td align="center"><b>Notes/Coments</b></td></tr>';

    while($row = mysqli_fetch_array($response)) {

    echo '<tr><td align="center">' .

    $row['ID'] . '</td><td align="center">' . 
    $row['Date'] . '</td><td align="center">' .
    $row['Name'] . '</td><td align="center">' .
    $row['Forklift'] . '</td><td align="center">' .
    $row['Hours'] . '</td><td align="center">' .
    $row['Brakes'] . '</td><td align="center">' .
    $row['Levers'] . '</td><td align="center">' .
    $row['Foot'] . '</td><td align="center">' .
    $row['Plate'] . '</td><td align="center">' .
    $row['Leaks'] . '</td><td align="center">' .
    $row['Cylinder'] . '</td><td align="center">' .
    $row['Electric'] . '</td><td align="center">' .
    $row['Mast'] . '</td><td align="center">' .
    $row['Broken'] . '</td><td align="center">' .
    $row['LightsMirrors'] . '</td><td align="center">' .
    $row['Seatbelt'] . '</td><td align="center">' .
    $row['Tires'] . '</td><td align="center">' .
    $row['AlarmHorn'] . '</td><td align="center">' .
    $row['Oil'] . '</td><td align="center">' .
    $row['Propane'] . '</td><td align="center">' .
    $row['Water'] . '</td><td align="center">' .
    $row['Charge'] . '</td><td align="center">' .
    $row['Comment'] . '</td><td align="center">';

    echo '</tr>';

    }

    echo '</table>';

?><script>var cells = document.getElementById('forkrpt').getElementsByTagName('td');
for (var i = 0; i < cells.length; i++) {
    if (cells[i].innerHTML == 'BAD') {
        cells[i].style.backgroundColor = "red";
    }
}</script>
<?php
    
}else {
    echo 'Could not issue database query';

echo mysqli_error($dbc);

}

mysqli_close($dbc);

?>
