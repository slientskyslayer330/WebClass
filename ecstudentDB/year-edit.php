<?php

include('connect.php');
$yID = $_REQUEST['yID']; 

$sql = "SELECT * FROM years WHERE yearID='$yID' ";
$run = mysqli_query($conn,$sql);

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
    <form action="year-update.php" method="POST">
    <label>No: </label>
    <input type="hidden" name="yearID"value="<?php echo $data['yearID']; ?>">
    <input type="text" name="newyearid"value="<?php echo $data['yearID']; ?>">
    <br>
    <label>Year: </label>
    <input type="text" name="year"value="<?php echo $data['year']; ?>">
    <br>
    <input type="submit" value="change">
   
    </form>
</body>
</html>