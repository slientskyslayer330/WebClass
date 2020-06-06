<?php

include('connect.php');

$sID = $_REQUEST['sID'];

$sql = "DELETE FROM students WHERE studentID = '$sID' ";
$run = mysqli_query($conn,$sql);

if($run){
    header('location: student-list.php');
}
?>