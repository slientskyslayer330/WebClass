<?php

include ('connect.php');

$sql = "SELECT * FROM years ";
$run = mysqli_query($conn, $sql);

$count = mysqli_num_rows($run);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href = "year-new.php"> add year </a>
    <table>
    <tr>
        <th>No.</th>
        <th>YearID</th>
        <th>Year</th>
    </tr>
    <?php for($i=0;$i<$count;$i++):
     $data = mysqli_fetch_array($run);
  ?>
  <tr>
    <td><?php echo $i+1,'.';?></td>
      <td><?php echo $data['yearID'];?></td>
      <td><?php echo $data['year'];?></td>
      <td><a href = "year-edit.php?yID=<?php echo $data['yearID'];?>">edit </a>
    <a onclick="return confirm('Are you sure you want to delete?');" href = "year-del.php?yID=<?php echo $data['yearID'];?>">delete </a></td>
    
  </tr>
    <?php endfor; ?>
        
    </table>
</body>
</html>