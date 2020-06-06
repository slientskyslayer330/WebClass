<?php

include('connect.php');
include('id.php');


$name=$_FILES['photo']['name'];
$temp=$_FILES['photo']['tmp_name'];

if(isset($name)) {
    move_uploaded_file($temp, 'photos/'.$name);
}

  $studentID = autoID('S','students','studentID','4');
  $studentname = $_REQUEST['studentname'];
  $rollno = $_REQUEST['rollno'];
  $yID = $_REQUEST['yearID'];
  $email = $_REQUEST['email'];
  $phone = $_REQUEST['phone'];
  $dob = $_REQUEST['dob'];
  $address = $_REQUEST['address'];

  if($yID=="Y01"){
    $roll = "IEC-".$rollno;
 }
 else if($yID=="Y02"){
    $roll = "IIEC-".$rollno;
 

 }
 else if($yID=="Y03"){
    $roll = "IIIEC-".$rollno;
    

 }
 else if($yID=="Y04"){
    $roll = "IVEC-".$rollno;
   
 }
 else if($yID=="Y05"){
    $roll = "VEC-".$rollno;
   

 }
 else if($yID=="Y06"){
    $roll = "VIEC-".$rollno;
 
 }

$sql = "INSERT INTO students VALUES('$studentname','$studentID','$roll','$yID','$name','$email','$phone','$dob','$address')";
$run = mysqli_query($conn,$sql);

if($run){
    header('location: student-list.php');
}
?>