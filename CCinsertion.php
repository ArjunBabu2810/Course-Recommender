<?php
  session_start();
   require './connection.php';
   echo "hai";
   if(isset($_POST['submit'])) {
    //$courseid=mt_rand(100000,999999);
    $college=$_POST['collegeid'];
    $course=$_POST['courseid'];
    $seats=$_POST['seats'];
    $date=$_POST['date'];
    $rating=0.0;
    $status=0;
    $sql="INSERT INTO `CollegeCourse` ( `Collegeid`, `Courseid`, `Seats`, `Rating`, `Status`, `Date`) 
            VALUES ('$college', '$course', '$seats', '0', '0', '$date');" ;
          echo $sql;
   $d=mysqli_query($dbcon,$sql);
    if($d){
        echo '<script>alert("Course Added")</script>';
       header('location:./CollegeCourse.php');

    }
        else{
        echo '<script>alert("try again")</script>';
        header('location:./CollegeCourse.php');  
         }  
   }
?>