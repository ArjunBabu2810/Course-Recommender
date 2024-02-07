<?php
session_start();
if(!isset($_SESSION['UserName'])){
    echo "Working";
    header('location:../Login/login.html');
}
?>
<?php
    require './connection.php';
    if(isset($_POST['approveall'])){
        $sql="UPDATE `College` SET  `Status` = 1";
                 echo $sql;
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert("Updated")</script>';
            header('location:./collegemanager.php'); 

        }
        else{
            echo '<script>alert("not updated")</script>';
            header('location:./collegemanager.php'); 

        }
    }
    if(isset($_POST['delete'])){
        $collegeid = $_POST['Collegeid'];
        mysqli_query($dbcon, "DELETE FROM Intrested WHERE College_id = $collegeid");
        mysqli_query($dbcon, "DELETE FROM CollegeCourse WHERE Collegeid = $collegeid");
        $sql="DELETE FROM College WHERE `College`.`Collegeid` =$collegeid";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert("College deleted")</script>';
            header('location:./collegemanager.php'); 
        }
        else{
            echo '<script>alert("not deleted")</script>';
            header('location:./collegemanager.php'); 

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
        $sql="UPDATE `College` SET `Name` = '$name', `Email` = '$email', `Password` = '$password',`Date` = '$date',
                 `Phone` = '$phone', `Website` = '$website', `Address` = '$address', `Place` = '$place', `Status` = '$status', `Rating` = '$rating'
                 WHERE `College`.`Collegeid` = '$collegeid'";
                 echo $sql;
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert("Updated")</script>';
            header('location:./collegemanager.php'); 

        }
        else{
            echo '<script>alert("not updated")</script>';
            header('location:./collegemanager.php'); 

        }
    }
?>