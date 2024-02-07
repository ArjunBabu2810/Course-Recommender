<?php
    session_start();
    require '../connection.php';
    if($_POST['update']){
        $email=$_SESSION['email'];
        $name=$_POST['name'];       
        $year=$_POST['year'];
        $collegeid=$_POST['college'];
        $courseid=$_POST['course'];
        $interestid=$_POST['interest'];
        $jobid=$_POST['job'];
        $sql="UPDATE `Student` SET `Name` = '$name', `Courseid` = '$courseid', `Collegeid` = '$collegeid', `Intrestid` = '$interestid', 
            `Year` = '$year', `Jobid` = '$jobid' WHERE `Student`.`Email` = '$email'";
            echo "$sql";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert(" updated")</script>';
            $_SESSION['username']=$name;
           header('location:index1.php');
        }
        else{
            echo '<script>alert("Error")</script>';
        }
        
    }
?>
