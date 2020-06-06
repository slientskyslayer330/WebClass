<?php
        include ('connect.php');
        $sql = "SELECT * FROM years";
        $run = mysqli_query($conn,$sql);
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
   
    <form action="student-add.php" method="POST" enctype="multipart/form-data">
        <label>Name: </label>
        <input type="text" name="studentname"> <br>

        <label>Roll No: </label>
        <input type="text" name="rollno"> <br>

         <label>Year: </label>
        <select name="yearID">
            <?php
            for ($i = 0; $i<$count;$i++):
                $data = mysqli_fetch_array($run);
            ?>
            <option value="<?php echo $data['yearID'] ?>"><?php echo $data['year'] ?></option>
            <?php endfor; ?>
        </select> <br>
        
        <label>Photo: </label>
        <input type="file" name="photo"  accept="image/*"> <br>
            
        <label>Email: </label>
        <input type="text" name="email"> <br>

        <label>Phone No: </label>
        <input type="text" name="phone"> <br>

        <label>Date of Birth: </label>
        <input type="date" name="dob"> <br>

        <label>Address: </label> <br>
        <input type="text" name="address"> <br>

        <input type="submit" value="add new student">
        

    </form>
</body>
</html>

