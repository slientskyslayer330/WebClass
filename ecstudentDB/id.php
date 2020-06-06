<?php

function autoID($prefix,$table,$col,$digit){

    include ('connect.php');

    $sql = "SELECT $col FROM $table"; 
    $run = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($run);
    
    if($count==0){
        return $prefix.str_pad("1",$digit,"0", STR_PAD_LEFT); 
    }
    else {
        
        $sql1 = "SELECT * FROM $table ORDER BY $col DESC";
        $run1 = mysqli_query($conn,$sql1);
        $data = mysqli_fetch_array($run1);
        $datanew = $data[$col];
        $newID = substr($datanew,$digit);
        ++$newID;
        return $prefix.str_pad($newID,$digit,"0", STR_PAD_LEFT); 
    
    }
} 

echo $studentID = autoID('S','students','studentID','4');
?>