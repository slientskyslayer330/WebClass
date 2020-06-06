<?php

include('connect.php');

$yID = $_REQUEST['yID'];

$sql = "SELECT * FROM students WHERE yearID = '$yID'";
$run = mysqli_query($conn,$sql);

$count = mysqli_num_rows($run);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student-list.css">
    <title>Document</title>
</head>
<body>

<div class = "title">
        <p>EC Student Database</p>
        <span><a href="student-new.php">add new student </a></span>
    </div>
<div class="table-box">
<table cellpadding = "10">
    
    <tr><th>No.</th>
        <th  id="studentname">Student Name</th>
        <th>Student ID</th>
        <th  id="studentroll">Roll No</th>
        <th>Year</th>
        <th>Photo</th>
        <th>Email</th>
        <th>Phone</th>
        <th id="address">Address</th>
        <th id="edit"></th>
        <th id="del"></th>
    </tr>
    <?php
        $sql1 = "SELECT * FROM years";
        $run1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($run1);
        ?>

    <form action="separate.php" method="POST">
    <tr><select name="yID">
    <?php
    for ($i=0; $i<$count1; $i++) : 
      $data1 = mysqli_fetch_array($run1);

    ?>
        <option value="<?php echo $data1['yearID']; ?>"><?php echo $data1['year']; ?></option>
    <?php endfor;?>
    </select>
    <input type="submit" value="search">
    </form>
    </tr>
    
    </tr>
    <tr>
    <?php

    $sql1 = "SELECT * FROM years WHERE yearID = '$yID'";
    $run1 = mysqli_query($conn,$sql1);
    $data1 = mysqli_fetch_array($run1);

    for ($i=0; $i<$count; $i++) : 
      $data = mysqli_fetch_array($run);
        
    ?>
    <td><?php echo $i+1,'.' ?></td>
        
    <td><?php echo $data['studentname'] ?></td>
    <td><?php echo $data['studentID'] ?></td>
    <td><?php echo $data['roll'] ?></td>
    
    <td><?php echo $data1['year'] ?></td>

    <td><img src="photos/<?php echo $data['photo'] ?>" alt="photo" width = "50" height= "50"></td>
    <td><?php echo $data['email'] ?></td>
    <td><?php echo $data['phone'] ?></td>
    <td><?php echo $data['address'] ?></td>

    <td><a  id="EDIT" href = "student-edit.php?sID=<?php echo $data['studentID'];?>">edit </a>
    <td ><a id="DEL" onclick = "return confirm('Are you sure?');" href= "student-del.php?sID=<?php echo $data['studentID']?>">delete </a></td>

    </tr>
    
    <?php endfor; ?>
    <tr><a href="student-list.php">To main database</a></tr>
    </table>
    </div>

</body>
</html>
