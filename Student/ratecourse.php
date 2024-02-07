<?php
    require '../connection.php';
    session_start();
    $id=$_SESSION['id'];
    $sql="SELECT Courseid FROM Student WHERE Studentid=$id";
    $data=mysqli_query($dbcon,$sql);
    $row=mysqli_fetch_array($data);
    $courseid=$row['Courseid'];
    $sql1="SELECT Name,Rating FROM Course WHERE Courseid=$courseid";
    $data1=mysqli_query($dbcon,$sql1);
    $row1=mysqli_fetch_array($data1);
    $rate=($row1['Rating']+$_POST['Rating'])/2;
    echo $rate;
    $sql3="UPDATE `Course` SET `Rating` = '$rate' WHERE `Course`.`Courseid` = $courseid;" ;
    $data3=mysqli_query($dbcon,$sql3);
    if($data3){
        echo '<script>alert("Updated")</script>';
       header('location:./courserating.php');

    }
        else{
        echo '<script>alert("try again")</script>';
        header('location:./courserating.php');  
         }  
?>