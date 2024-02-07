<?php
    session_start();
    require '../connection.php';
    if($_POST['update']){
        $email=$_SESSION['email'];
        $name=$_POST['name'];       
        $website=$_POST['website'];
        $address=$_POST['address'];
        $place=$_POST['place'];
        $sql="UPDATE `College` SET `Name` = '$name', `Place` = '$place', `Address` = '$address', 
            `Website` = '$website' WHERE `Email` = '$email'";
            echo "$sql";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert(" updated")</script>';
            $_SESSION['username']=$name;
            header('location:login.html');
        }
        else{
            echo '<script>alert("Error")</script>';
            header('location:profileupdate.html');
        }
        
    }
?>
