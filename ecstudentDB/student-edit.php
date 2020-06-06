<?php

include('connect.php');

$sID = $_REQUEST['sID'];

$sql = "SELECT * FROM students WHERE studentID = '$sID'";
$run = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($run);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="student-update.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="sID" value= "<?php echo $data['studentID'];?>">

        <label>Name: </label>
        <input type="text" name="studentname" value= "<?php echo $data['studentname'];?>"> <br>

        <label>Roll No: </label>
        <input type="text" name="rollno"  value= "<?php echo $data['roll'];?>"> <br>
        
        <?php
            $sql1 = "SELECT * FROM students s,years y WHERE s.yearID = y.yearID AND studentID = '$sID'";
            $run1 = mysqli_query($conn, $sql1);
            $data1 = mysqli_fetch_array($run1);
            ?>
        
         <label>Year: </label>
         <span><?php echo $data1['year'] ;?></span>
        
        <select name="yearID" >
        <option value="0">Choose...</option>

            <?php
            $sql2 = "SELECT * FROM years";
            $run2 = mysqli_query($conn, $sql2);
            
            $count = mysqli_num_rows($run2);
            for($i=0;$i<$count;$i++):
                $data2 = mysqli_fetch_array($run2);
            ?>

        <option value="<?php echo $data2['yearID'] ;?>"><?php echo $data2['year'] ;?></option>
            <?php endfor; ?>
        </select> <br>
        
        <label>Photo: </label>
        <input type="file" name="photo"  accept="image/*" value= "0"> <br>
        <img src="photos/<?php echo $data['photo'] ;?>" alt="photo" width = "50" height= "50"> <br>

        <label>Email: </label>
        <input type="text" name="email"value= "<?php echo $data['email'];?>"> <br>

        <label>Phone No: </label>
        <input type="text" name="phone"value= "<?php echo $data['phone'];?>"> <br>

        <label>Date of Birth: </label>
        <input type="date" name="dob" value= "<?php echo $data['dob'];?>"><br>

        <label>Address: </label> <br>
        <input type="text" name="address" value= "<?php echo $data['address'];?>"><br>

        <input type="submit" value="update!">
        

    </form>
</body>
</html>