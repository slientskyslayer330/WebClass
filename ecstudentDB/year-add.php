<?php

include ('connect.php');
include ('id.php');

echo $yID = autoID('Y','years','yearID','2');
$year = $_GET['year'];   

$sql = "INSERT INTO years VALUES ('$yID', '$year')";

$run = mysqli_query($conn,$sql);

if($run){
    header ('location: year-list.php');
}
?>