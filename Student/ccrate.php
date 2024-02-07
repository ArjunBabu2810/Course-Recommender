<?php
    require '../connection.php';
    session_start();
    $id=$_SESSION['id'];
    $ccid=$_POST['ccid'];
    $sql1="SELECT Rating FROM CollegeCourse WHERE CCid=$ccid";
    $data1=mysqli_query($dbcon,$sql1);
    $row1=mysqli_fetch_array($data1);
    $rate=($row1['Rating']+$_POST['Rating'])/2;
    echo $rate;
    echo $ccid;
    $sql3="UPDATE `CollegeCourse` SET `Rating` = '$rate' WHERE `CollegeCourse`.`CCid` = $ccid;" ;
    $data3=mysqli_query($dbcon,$sql3);
    if($data3){
        echo '<script>alert("Updated")</script>';
       header('location:./CCrating.php');

    }
        else{
        echo '<script>alert("try again")</script>';
        header('location:./CCrating.php');  
         }  
?>