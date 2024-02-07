<?php
   require '../connection.php';
 //  echo "hai";
   if(isset($_POST['update'])) {
    //$courseid=mt_rand(100000,999999);
    $ccid=$_POST['CCid'];
    $college=$_POST['Collegeid'];
    $course=$_POST['Courseid'];
    $seats=$_POST['Seats'];
    $certificates=$_POST['certificates'];
    $date=$_POST['date'];
    $rating=$_POST['Rating'];
    $status=$_POST['Status'];
    $sql="UPDATE `CollegeCourse` SET `Collegeid` = '$college', `Courseid` = '$course',
         `Seats` = '$seats',`Certificates` = '$certificates',`Date` = '$date', `Rating` = '$rating', `Status` = '$status' WHERE `CollegeCourse`.`CCid` = $ccid; " ;
          echo $sql;
   $d=mysqli_query($dbcon,$sql);
    if($d){
        echo '<script>alert("Updated")</script>';
       header('location:./CollegeCourse.php');

    }
        else{
        echo '<script>alert("try again")</script>';
        header('location:./CollegeCourse.php');  
         }  
   }
   elseif (isset($_POST['delete'])) {
    $ccid=$_POST['CCid'];
    $sql= "DELETE FROM Intrested WHERE CC_id = $ccid";
    mysqli_query($dbcon,$sql);
    $sql="DELETE FROM CollegeCourse WHERE `CollegeCourse`.`CCid` =$ccid";
    $data=mysqli_query($dbcon,$sql);
    if($data){
        echo '<script>alert("CollegeCourse deleted")</script>';
        header('location:./CollegeCourse.php');
    }
    else{
        echo '<script>alert("not deleted")</script>';
        header('location:./CollegeCourse.php');
    }    
   }
?>