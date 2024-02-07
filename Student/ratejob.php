<?php
    require '../connection.php';
    session_start();
    $id=$_SESSION['id'];
    $sql="SELECT Jobid FROM Student WHERE Studentid=$id";
    $data=mysqli_query($dbcon,$sql);
    $row=mysqli_fetch_array($data);
    $jobid=$row['Jobid'];
    $sql1="SELECT Name,Rating FROM Job WHERE Jobid=$jobid";
    $data1=mysqli_query($dbcon,$sql1);
    $row1=mysqli_fetch_array($data1);
    $rate=($row1['Rating']+$_POST['Rating'])/2;
    echo $rate;
    $sql3="UPDATE `Job` SET `Rating` = '$rate' WHERE `Job`.`Jobid` = $jobid;" ;
    $data3=mysqli_query($dbcon,$sql3);
    if($data3){
        echo '<script>alert("Updated")</script>';
       header('location:./jobrating.php');

    }
        else{
        echo '<script>alert("try again")</script>';
        header('location:./jobrating.php');  
         }  
?>