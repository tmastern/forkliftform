<?php

if(isset($_POST['submit'])){
    $data_missing = array();

    if(empty($_POST['date'])){
        $data_missing[] = 'Date';
    
    } else {
    $date = trim($_POST['date']);

    }

    if(empty($_POST['name'])){
        $data_missing[] = 'name';
    
    } else {
    $name = trim($_POST['name']);

    }

    if(empty($_POST['forklift'])){
        $data_missing[] = 'forklift';
    
    } else {
    $forklift = trim($_POST['forklift']);

    }

    if(empty($_POST['meter'])){
        $data_missing[] = 'meter';
    
    } else {
    $meter = trim($_POST['meter']);

    }

    if(empty($_POST['brakes'])){
        $data_missing[] = 'brakes';
    
    } else {
    $brakes = trim($_POST['brakes']);

    }

    if(empty($_POST['levers'])){
        $data_missing[] = 'levers';
    
    } else {
    $levers = trim($_POST['levers']);

    }

    if(empty($_POST['foot'])){
        $data_missing[] = 'foot';
    
    } else {
    $foot = trim($_POST['foot']);

    }

    if(empty($_POST['plate'])){
        $data_missing[] = 'plate';
    
    } else {
    $plate = trim($_POST['plate']);

    }

    if(empty($_POST['leaks'])){
        $data_missing[] = 'leaks';
    
    } else {
    $leaks = trim($_POST['leaks']);

    }

    if(empty($_POST['cyl'])){
        $data_missing[] = 'cyl';
    
    } else {
    $cyl = trim($_POST['cyl']);

    }

    if(empty($_POST['elec'])){
        $data_missing[] = 'elec';
    
    } else {
    $elec = trim($_POST['elec']);

    }

    if(empty($_POST['mast'])){
        $data_missing[] = 'mast';
    
    } else {
    $mast = trim($_POST['mast']);

    }

    if(empty($_POST['broke'])){
        $data_missing[] = 'broke';
    
    } else {
    $broke = trim($_POST['broke']);

    }

    if(empty($_POST['lights'])){
        $data_missing[] = 'lights';
    
    } else {
    $lights = trim($_POST['lights']);

    }

    if(empty($_POST['seat'])){
        $data_missing[] = 'seat';
    
    } else {
    $seat = trim($_POST['seat']);

    }

    if(empty($_POST['tires'])){
        $data_missing[] = 'tires';
    
    } else {
    $tires = trim($_POST['tires']);

    }

    if(empty($_POST['horn'])){
        $data_missing[] = 'horn';
    
    } else {
    $horn = trim($_POST['horn']);

    }

    if(empty($_POST['oil'])){
        $data_missing[] = 'oil';
    
    } else {
    $oil = trim($_POST['oil']);

    }

    if(empty($_POST['prop'])){
        $data_missing[] = 'prop';
    
    } else {
    $prop = trim($_POST['prop']);

    }

    if(empty($_POST['water'])){
        $data_missing[] = 'water';
    
    } else {
    $water = trim($_POST['water']);

    }

    if(empty($_POST['charge'])){
        $data_missing[] = 'charge';
    
    } else {
    $charge = trim($_POST['charge']);

    }


    $comment = $_POST['comment'];


    if(empty($data_missing)){

        require_once('../connect.php');

        $query = "INSERT INTO forkliftdata (ID, Date, Name, Forklift, Hours, Brakes, Levers, Foot, Plate, Leaks, Cylinder, Electric, Mast, Broken, LightsMirrors, 
        Seatbelt, Tires, AlarmHorn, Oil, Propane, Water, Charge, Comment)
         VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);

        
        mysqli_stmt_bind_param($stmt, "sssissssssssssssssssss", $date, $name, $forklift, $meter, $brakes, $levers, $foot, $plate, $leaks, $cyl, $elec, $mast, $broke, $lights, 
        $seat, $tires, $horn, $oil, $prop, $water, $charge, $comment);
        
        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Record Entered';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        
        } else {

            echo 'An Error Occurred<br />';

            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

        
    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing) {
            echo "$missing<br />";
        }
    }
}


echo <<<_END

<html>
<head>
<link rel="stylesheet" type="text/css" href="forkliftform.css" />
</head>
<h3 style="text-align: center;">MNT-003-FRM-02 Lift Truck Inspection</h3>
<body>
    <h5 style="text-align: center;">Each forklift is operationally and visually inspected each day by the first operator.
        <br>The operator checks the appropriate box, and enters a brief description in the Notes section of any issues found.
        <br>Notify a supervisor of any issues encountered.</h5> 
<form action="http://198.30.136.249/forklift.php" method="post">
    <table border="1" align="center">
        <tr>
            <th>Inspection Items</th>
            <th>Status</th>
        </tr>

        <tr><td>
            Inspector's Name:
            <td><select name="name" style="heigth: 80%;">
                <option value="Terry Davis">Terry Davis</option> 
                <option value="Corey Egbert">Corey Egbert</option>
                <option value="Dave Brockman">Dave Brockman</option> 
                <option value="Robert Hill">Robert Hill</option>
                <option value="Johnny Hopkins">Johnny Hopkins</option>
                <option value="John Blackmore">John Blackmore</option>
                <option value="Rascoe Smith">Rascoe Smith</option>
                <option value="Virgilio Monato">Virgilio Nonato</option>
                <option value="Paul Baker">Paul Baker</option>
                <option value="Keith Mason">Keith Mason</option>
                <option value="Dave Burton">Dave Burton</option>
                <option value="Other">Other</option>           
        <tr><td>
            Forklift ID:
            <td><select name="forklift">
                <option value="Clamp 8FBE18U">Clamp 8FBE18U</option>
                <option value="Clamp 7FBEU18">Clamp 7FBEU18</option>
                <option value="Lift 7BEU15N">Lift 7BEU15N</option>
                <option value="Lift 7FBEU15O">Lift 7BEU15O</option>
        <tr><td>
            Date:<td>
            <input type="date" name="date">
        <tr><td>
            Hour Meter Reading:
            <td><input type="text" name="meter">
        <tr><td>
            Parking Brake and Brakes:
            <td><label for="OK"><input type="radio" 
                class="green"
                id="OK" 
                name="brakes" 
                value="OK"
                >OK</label>
                <label for="Issue"><input type="radio"
                class="red"
                id="Issue" 
                name="brakes" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Operation Levers and Controls:
            <td><label for="OK2"><input type="radio"
                class="green"
                id="OK2" 
                name="levers" 
                value="OK"
                >OK</label>
                <label for="Issue2"><input type="radio"
                class="red"
                id="Issue2" 
                name="levers" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
             Foot Controls:
             <td><label for="OK3"><input type="radio"
                class="green"
                id="OK3" 
                name="foot" 
                value="OK"
                >OK</label>
                <label for="Issue3"><input type="radio"
                class="red"
                id="Issue3" 
                name="foot" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Data Plate Visible:
            <td><label for="OK4"><input type="radio"
                class="green"
                id="OK4" 
                name="plate" 
                value="OK"
                >OK</label>
                <label for="Issue4"><input type="radio"
                class="red"
                id="Issue4" 
                name="plate" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Hydraulic Leaks:
            <td><label for="OK5"><input type="radio"
                class="green"
                id="OK5" 
                name="leaks" 
                value="OK"
                >OK</label>
                <label for="Issue5"><input type="radio"
                class="red"
                id="Issue5" 
                name="leaks" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Extension Cylinder and Chains:
            <td><label for="OK6"><input type="radio"
                class="green"
                id="OK6" 
                name="cyl" 
                value="OK"
                >OK</label>
                <label for="Issue6"><input type="radio"
                class="red"
                id="Issue6" 
                name="cyl" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Electric Lines:
            <td><label for="OK7"><input type="radio"
                class="green"
                id="OK7" 
                name="elec" 
                value="OK"
                >OK</label>
                <label for="Issue7"><input type="radio"
                class="red"
                id="Issue7" 
                name="elec" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Verticle Mast Slide:
            <td><label for="OK8"><input type="radio"
                class="green"
                id="OK8" 
                name="mast" 
                value="OK"
                >OK</label>
                <label for="Issue8"><input type="radio"
                class="red"
                id="Issue8" 
                name="mast" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Broken, Cracked, Loose Parts:
            <td><label for="OK9"><input type="radio"
                class="green"
                id="OK9" 
                name="broke" 
                value="OK"
                >OK</label>
                <label for="Issue9"><input type="radio"
                class="red"
                id="Issue9" 
                name="broke" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Lights and Mirrors:
            <td><label for="OK10"><input type="radio"
                class="green"
                id="OK10" 
                name="lights" 
                value="OK"
                >OK</label>
                <label for="Issue10"><input type="radio"
                class="red"
                id="Issue10" 
                name="lights" 
                value="BAD"
                >Issue</label>          
        </td></tr>
        <tr><td>
            Seats and Seat Belt:
            <td><label for="OK11"><input type="radio"
                class="green"
                id="OK11" 
                name="seat" 
                value="OK"
                >OK</label>
                <label for="Issue11"><input type="radio"
                class="red"
                id="Issue11" 
                name="seat" 
                value="BAD"
                >Issue</label>        
        </td></tr>
        <tr><td>
            Tires:
            <td><label for="OK12"><input type="radio"
                class="green"
                id="OK12" 
                name="tires" 
                value="OK"
                >OK</label>
                <label for="Issue12"><input type="radio"
                class="red"
                id="Issue12" 
                name="tires" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Backup Alarm and Horn:
            <td><label for="OK13"><input type="radio"
                class="green"
                id="OK13" 
                name="horn" 
                value="OK"
                >OK</label>
                <label for="Issue13"><input type="radio"
                class="red"
                id="Issue13" 
                name="horn" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Oil Level:
            <td><label for="OK14"><input type="radio"
                class="green"
                id="OK14" 
                name="oil" 
                value="OK"
                >OK</label>
                <label for="Issue14"><input type="radio"
                class="red"
                id="Issue14" 
                name="oil" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Propane Fittings and Hose:
            <td><label for="OK15"><input type="radio"
                class="green"
                id="OK15" 
                name="prop" 
                value="OK"
                >OK</label>
                <label for="Issue15"><input type="radio"
                class="red"
                id="Issue15" 
                name="prop" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Battery Water Level:
            <td><label for="OK16"><input type="radio"
                class="green"
                id="OK16" 
                name="water" 
                value="OK"
                >OK</label>
                <label for="Issue16"><input type="radio"
                class="red"
                id="Issue16" 
                name="water" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            Battery Charge:
            <td><label for="OK17"><input type="radio"
                class="green"
                id="OK17" 
                name="charge" 
                value="OK"
                >OK</label>
                <label for="Issue17"><input type="radio"
                class="red"
                id="Issue17" 
                name="charge" 
                value="BAD"
                >Issue</label>
        </td></tr>
        <tr><td>
            <input type="submit" name="submit" value="Submit"
                class="submit"</td>
                <td><input type="text" name="comment" placeholder="Comment">
        </td></tr>
    </table>
</form>
</body>
</html>
_END;
?>