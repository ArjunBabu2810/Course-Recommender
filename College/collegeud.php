<?php
    require '../connection.php';
    if(isset($_POST['delete'])){
        $collegeid = $_POST['Collegeid'];
        mysqli_query($dbcon, "DELETE FROM Intrested WHERE College_id = $collegeid");
        mysqli_query($dbcon, "DELETE FROM CollegeCourse WHERE Collegeid = $collegeid");
        $sql="DELETE FROM college WHERE `college`.`Collegeid` =$collegeid";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert("College deleted")</script>';
        }
        else{
            echo '<script>alert("not deleted")</script>';
        }    
    }
    elseif(isset($_POST['update'])){
        $collegeid=$_POST['Collegeid'];
        $name=$_POST['Name'];
        $email=$_POST['Email'];
        $password=$_POST['Password'];
        $phone=$_POST['Phone'];
        $date=$_POST['date'];
        $website=$_POST['Website'];
        $address=$_POST['Address'];
        $place=$_POST['Place'];
        $status=$_POST['Status'];
        $rating=$_POST['Rating'];
        if(isset($_POST['Rating'])){
            $rating=0;
        }
        $sql="UPDATE `College` SET `Name` = '$name', `Email` = '$email', `Password` = '$password',
                 `Phone` = '$phone',`Date` = '$date', `Website` = '$website', `Address` = '$address', `Place` = '$place', `Status` = '$status', `Rating` = '$rating'
                 WHERE `College`.`Collegeid` = '$collegeid'";
        $data=mysqli_query($dbcon,$sql);
        echo "$sql";
        if($data){
            echo '<script>alert("Updated")</script>';
            header('location:./college.php');
        }
        else{
            echo '<script>alert("not updated")</script>';
            header('location:./college.php');
        }
    }
?>