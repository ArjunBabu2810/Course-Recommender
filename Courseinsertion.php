<?php
   require './connection.php';
   echo "hai";
   if(isset($_POST['submit'])) {
    //$courseid=mt_rand(100000,999999);
    $name=$_POST['name'];
    $semesters=$_POST['semesters'];
    $prequality=$_POST['prequality'];
    $intrest=$_POST['intrest'];
    $date=$_POST['date'];
    $rating=0.0;
    $status=0;
    $sql="INSERT INTO `Course` (`Courseid`, `Name`, `Semester`, `Prequality`, `Rating`, `Status`,`Intrestid`,`Date`) VALUES 
    (NULL, '$name', '$semesters', $prequality, NULL, NULL,$intrest,'$date')" ;
          echo $sql;
   $d=mysqli_query($dbcon,$sql);
    if($d){
        echo '<script>alert("Course Added")</script>';
        header('location:./course.php');

    }
        else{
        echo '<script>alert("try again")</script>';
    header('location:./course.php');   
    }  
   }
?>