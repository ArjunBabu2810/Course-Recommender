<?php
   require '../connection.php';
   echo "hai";
   if(isset($_POST['submit'])) {
    //$courseid=mt_rand(100000,999999);
    $college=$_POST['collegeid'];
    $course=$_POST['courseid'];
    $seats=$_POST['seats'];
    $rating=0.0;
    $status=0;
    $sql="INSERT INTO `College_Courses` ( `College_id`, `Course_id`, `Seats`, `Rating`, `Status`) 
            VALUES ('$college', '$course', '$seats', '0', '0');" ;
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