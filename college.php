<?php

    require './connection.php' ;
 // echo '<script>alert("hai")</script>';
    echo "hai college";
    
   // $collegeid=mt_rand(100000,999999);
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $website=$_POST['website'];
    $address=$_POST['address'];
    $place=$_POST['place'];
    $date=$_POST['date'];
    $status=0;
    $rating=0.0;
    $sql="INSERT INTO `College` (`Name`, `Email`, `Password`, `Phone`, `Website`, `Address`, `Place`, `Date`, `Status`, `Rating`) 
    VALUES ('$name', '$email', '$password', '$phone', '$website', '$address', '$place', '$date', '$status', '$rating');";
    echo "<br> $sql";
    $insert=mysqli_query($dbcon,$sql);
    if($insert)
    echo '<script>alert("inserted")</script>';
    else
    echo '<script>alert("try again")</script>';
    header('location:./college.html');
?>
