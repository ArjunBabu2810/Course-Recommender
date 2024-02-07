<?php
    session_start();
    require '../connection.php';
    $id=$_SESSION['id'];
    $sql="DELETE FROM Student WHERE Studentid=$id";
    echo $sql;
    $data=mysqli_query($dbcon,$sql);
    if($data){
        session_destroy();
        header('location:./index1.php');
        }else{
            echo "Error!";
    }
?>