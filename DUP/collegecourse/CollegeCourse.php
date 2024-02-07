<html>
    <head>
        <title>Courses In college</title>
    </head>
    <body>
        <form action="CCinsertion.php" method="post">
        <span>College
            <select name="collegeid" id="collegeid">
                <?php
                    require '../connection.php';
                    $sql="select College_id,Name from College";
                    $data=mysqli_query($dbcon,$sql);
                    if($data){
                        echo "values";
                        $r=mysqli_num_rows($data);
                        for($i=0;$i<$r;$i++){
                            $row=mysqli_fetch_array($data);
                            echo "<option value=".$row['College_id'].">".$row['Name']."</option>";
                        }
                    }
                    
                ?>
            </select>
        </span>
        <span>Course
            <select name="courseid" id="courseid">
                <?php
                    require '../connection.php';
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
        <span>Number of seats
            <input type="number" name=seats id="seats">
        </span>
        <input type="submit" value=submit name=submit>
        </form>
    </body>
</html>