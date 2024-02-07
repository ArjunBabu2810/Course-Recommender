<?php

    require '../connection.php' ;
 // echo '<script>alert("hai")</script>';
    echo "hai college";
    
    $collegeid=mt_rand(100000,999999);
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $website=$_POST['website'];
    $address=$_POST['address'];
    $place=$_POST['place'];
    $status=0;
    $rating=0.0;
    $sql="INSERT INTO `College` (`College_id`, `Name`, `Email`, `Password`, `Phone`, `Web_site`, `Address`, `Place`, `Status`, `Rating`)
         VALUES ('$collegeid', '$name', '$email', '$password', '$phone', '$website', '$address', '$place', '$status', '$rating')";
    echo "<br> $sql";
    $insert=mysqli_query($dbcon,$sql);
    if($insert)
    echo '<script>alert("inserted")</script>';
    else
    echo '<script>alert("try again")</script>';
    header('location:./college.html');
?>
