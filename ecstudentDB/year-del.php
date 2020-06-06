<?php

include('connect.php');

$yid = $_REQUEST['yID'];
$sql = "DELETE FROM years WHERE yearID='$yid'";
$run = mysqli_query($conn, $sql);


if($run){
    echo "success";
    header('location: year-list.php');
}
?>

