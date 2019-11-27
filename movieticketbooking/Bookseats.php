<?php
require 'common.php';
//connect to database and the details.
//$con = mysql_connect('localhost', 'root', 'xxxxx');
/*if (!$con) { 
    die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("bus-ticketing", $con);*/
//after select departure
//prompt type after select the button
$seats=$_GET["seats"]; 
//input from seats button
$querySeat="SELECT type FROM seats WHERE row_id = '".$rowId."' AND column_id = '".$columnId."' ";
$resultSeat = mysql_query($querySeat);
while($row = mysql_fetch_array($resultSeat)) { 
    echo '<option value="' . $row['type'] . '">' . $row['type'] . '</option>';  
}		
mysql_close();?>