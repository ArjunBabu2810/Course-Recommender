<?php
    require './connection.php';
    if(isset($_POST['delete'])){
        $SUid = $_POST['SUid'];
        $sql="DELETE FROM Superuser WHERE `Superuser`.`SUid` =$SUid";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert("deleted")</script>';
            header('location:./Adminmanage.php');
        }
        else{
            echo '<script>alert("not deleted")</script>';
            header('location:./Adminmanage.php');
        }    
    }
    elseif(isset($_POST['update'])){
        $SUid=$_POST['SUid'];
        $name=$_POST['Name'];
        $email=$_POST['Email'];
        $password=$_POST['Password'];
        $sql="UPDATE `superuser` SET `Name` = '$name', `Email` = '$email',
             `Password` = '$password' WHERE `superuser`.`SUid` = $SUid;";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert("Updated")</script>';
            header('location:./Adminmanage.php');
        }
        else{
            echo '<script>alert("not updated")</script>';
            header('location:./Adminmanage.php');
        }
    }
?>