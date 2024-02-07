<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course Entry</title>
</head>
<body>
    <h2>Enter Course Details</h2>
    <form action="Courseinsertion.php" method="post">
        <span>Course Name<input type="text" name="name" id="name"></span>
        <span>No.of Semesters<input type="number" name="semesters" id=""></span>
        <span>Prequality<select name="prequality" id="prequality">
            <option value="NULL">Not Required</option>
        <?php
            require '../connection.php' ;
            $sql="select Course_id,Name from Course";
            $data=mysqli_query($dbcon,$sql);
            if($data){
                echo "values";
                $r=mysqli_num_rows($data);
                for($i=0;$i<$r;$i++){
                    $row=mysqli_fetch_array($data);
                    echo "<option value=".$row['Course_id'].">".$row['Name']."</option>";
                }
            }
            
        ?>
        </select>
        </span>
        <input type="submit" name="submit" id="submit" value="submit">
    </form>
    
</body>
</html>