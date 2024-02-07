<?php
    session_start();
    require '../connection.php';
    
    $id= $_SESSION['id'];
    $date=date("y-m-d");
    if(isset($_GET['CCid'])){
        $CCid= $_GET['CCid'];
        $sql="INSERT INTO `Intrested` (`Student_id`, `CC_id`,  `Date`)  VALUES ('$id',  '$CCid',  '$date');";
        echo $sql;
        $sql2 = "SELECT Student_id, CC_id FROM Intrested WHERE Student_id = $id AND CC_id = $CCid";
        $data2 = mysqli_query($dbcon, $sql2);

        if ($data2) { // Check if the query was successful
            if(mysqli_num_rows($data2)>0){
                echo "<script>alert('You have already expressed interest in this course!')</script>";
                $sql3="DELETE FROM Intrested WHERE Student_id=$id AND CC_id=$CCid";
                echo $sql3;
                $data3=mysqli_query($dbcon,$sql3);
                if($data3){
                    echo '<script>alert("Changed")</script>';
                 header('location:./CCmanage.php');
            
                }
                    else{
                    echo '<script>alert("try again")</script>';
                    header('location:./CCmanage.php');  
                    }
            }else{
                $data=mysqli_query($dbcon,$sql);
                if($data){
                    echo '<script>alert("Updated")</script>';
                 header('location:./CCmanage.php');
            
                }
                    else{
                    echo '<script>alert("try again")</script>';
                    header('location:./CCmanage.php');  
                    }

            }
        } else {
            echo "Error in the query: " . mysqli_error($dbcon);
        }
    }
    else if(isset($_GET['Courseid'])){
        echo 'hai';
        $Courseid= $_GET['Courseid'];
        $sql="INSERT INTO `Intrested` (`Student_id`, `Course_id`,  `Date`)  VALUES ('$id',  '$Courseid',  '$date');";
        echo $sql;
        $sql2 = "SELECT Student_id, Course_id FROM Intrested WHERE Student_id = $id AND Course_id = $Courseid";
        $data2 = mysqli_query($dbcon, $sql2);

        if ($data2) { // Check if the query was successful
            if(mysqli_num_rows($data2)>0){
                echo "<script>alert('You have already expressed interest in this course!')</script>";
                $sql3="DELETE FROM Intrested WHERE Student_id=$id AND Course_id=$Courseid";
                echo $sql3;
                $data3=mysqli_query($dbcon,$sql3);
                if($data3){
                    echo '<script>alert("Changed")</script>';
                 header('location:./courseview.php');
            
                }
                    else{
                    echo '<script>alert("try again")</script>';
                    header('location:./courseview.php');  
                    }
            }else{
                $data=mysqli_query($dbcon,$sql);
                if($data){
                    echo '<script>alert("Updated")</script>';
                 header('location:./courseview.php');
            
                }
                    else{
                    echo '<script>alert("try again")</script>';
                    header('location:./courseview.php');  
                    }

            }
        } else {
            echo "Error in the query: " . mysqli_error($dbcon);
        }
    }
    else if(isset($_GET['Collegeid'])){
        echo 'hai';
        $Collegeid= $_GET['Collegeid'];
        $sql="INSERT INTO `Intrested` (`Student_id`, `College_id`,  `Date`)  VALUES ('$id',  '$Collegeid',  '$date');";
        echo $sql;
        $sql2 = "SELECT Student_id, College_id FROM Intrested WHERE Student_id = $id AND College_id = $Collegeid";
        $data2 = mysqli_query($dbcon, $sql2);
        echo mysqli_num_rows($data2);
        if ($data2) { // Check if the query was successful
            if(mysqli_num_rows($data2)>0){
                echo "<script>alert('You have already expressed interest in this course!')</script>";
                $sql3="DELETE FROM Intrested WHERE Student_id=$id AND College_id=$Collegeid";
                echo $sql3;
                $data3=mysqli_query($dbcon,$sql3);
                if($data3){
                    echo '<script>alert("Changed")</script>';
                 header('location:./collegemanager.php');
            
                }
                    else{
                    echo '<script>alert("try again")</script>';
                    header('location:./collegemanager.php');  
                    }
            }else{
                $data=mysqli_query($dbcon,$sql);
                if($data){
                    echo '<script>alert("Updated")</script>';
                 header('location:./collegemanager.php');
            
                }
                    else{
                    echo '<script>alert("try again")</script>';
                    header('location:./collegemanager.php');  
                    }

            }
        } else {
            echo "Error in the query: " . mysqli_error($dbcon);
        }
    }
    else if(isset($_GET['Jobid'])){
        echo 'hai';
        $Jobid= $_GET['Jobid'];
        $sql="INSERT INTO `Intrested` (`Student_id`, `Job_id`,  `Date`)  VALUES ('$id',  '$Jobid',  '$date');";
        echo $sql;
        $sql2 = "SELECT Student_id, Job_id FROM Intrested WHERE Student_id = $id AND Job_id = $Jobid";
        $data2 = mysqli_query($dbcon, $sql2);
        echo mysqli_num_rows($data2);
        if ($data2) { // Check if the query was successful
            if(mysqli_num_rows($data2)>0){
                echo "<script>alert('You have already expressed interest in this course!')</script>";
                $sql3="DELETE FROM Intrested WHERE Student_id=$id AND Job_id=$Jobid";
                echo $sql3;
                $data3=mysqli_query($dbcon,$sql3);
                if($data3){
                    echo '<script>alert("Changed")</script>';
                 header('location:./jobview.php');
            
                }
                    else{
                    echo '<script>alert("try again")</script>';
                    header('location:./jobview.php');  
                    }
            }else{
                $data=mysqli_query($dbcon,$sql);
                if($data){
                    echo '<script>alert("Updated")</script>';
                 header('location:./jobview.php');
            
                }
                    else{
                    echo '<script>alert("try again")</script>';
                    header('location:./jobview.php');  
                    }

            }
        } else {
            echo "Error in the query: " . mysqli_error($dbcon);
        }
    }
?>