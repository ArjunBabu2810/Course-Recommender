<?php
    session_start();
   require '../connection.php';
   echo "hai";
   if(isset($_POST['submit'])) {
    //$courseid=mt_rand(100000,999999);
    $college=$_POST['Collegeid'];
    $course=$_POST['courseid'];
    $seats=$_POST['seats'];
    $date=$_POST['date'];
    $certificates=$_POST['certificates'];
    $rating=0.0;
    $status=0;
    echo $_POST['date'];
    $sql="INSERT INTO `CollegeCourse` ( `Collegeid`, `Courseid`, `Seats`,`Certificates`, `Rating`, `Status`, `Date`) 
            VALUES ('$college', '$course', '$seats','$certificates', '0', '0', '$date');" ;
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