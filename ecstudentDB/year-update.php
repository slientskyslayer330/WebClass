<?php

include('connect.php');
$year = $_REQUEST['year'];
$yearID = $_REQUEST['yearID'];
$newyearid = $_REQUEST['newyearid'];

$sql = "UPDATE years SET yearID = '$newyearid' , year = '$year' WHERE yearID='$yearID'";

$run = mysqli_query($conn,$sql);

if($run){
header('location: year-list.php');
}
?>