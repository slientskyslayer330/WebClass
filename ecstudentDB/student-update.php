<?php

include('connect.php');

 $sID = $_REQUEST['sID'];
$studentname = $_REQUEST['studentname'];
$rollno = $_REQUEST['rollno'];
$yearID = $_REQUEST['yearID'];

$photo=$_FILES['photo']['name'];
$temp=$_FILES['photo']['tmp_name'];

$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

$dob = $_REQUEST['dob'];
$address = $_REQUEST['address'];

if ($yearID != "0"){
echo "not equal to zero";
$sql2 = "UPDATE students SET yearID = '$yearID' WHERE studentID = '$sID'";
$run2 = mysqli_query($conn,$sql2);
}
else{
    echo "equal to zero";
}

if($photo!=''&& $temp !='') {
    move_uploaded_file($temp, 'photos/'.$photo);

    $sql = "UPDATE students SET photo='$photo' WHERE studentID ='$sID'";
    $run3 = mysqli_query($conn,$sql);
}

    $sql = "UPDATE students SET studentname = '$studentname' , studentID = '$sID', roll = '$rollno', email ='$email', phone='$phone', dob = '$dob', address = '$address' WHERE studentID='$sID'";
    $run = mysqli_query($conn,$sql);

if($run){
   header('location: student-list.php');
    }





?>