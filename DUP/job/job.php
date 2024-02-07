<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Entry</title>
</head>
<body>
    <h2>Enter Job Details</h2>
    <form action="jobinsertion.php" method="post">
        <span>Job Name<input type="text" name="name" id="name"></span>
        <span>Prequality
            <select name="prequality" id="prequality">
                <option value="NULL">Not Required</option>
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
        <span>Rating<input type="text" name="rating" id="rating"></span>
        <span>Status
            Available<input type="radio" name=status id=status value=1>
            Not available<input type="radio" name=status id=status checked value=0>
        </span>
        <input type="submit" name=submit value=submit>
    </form>
    
</body>
</html>