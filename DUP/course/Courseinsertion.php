<?php
   require '../connection.php';
   echo "hai";
   if(isset($_POST['submit'])) {
    //$courseid=mt_rand(100000,999999);
    $name=$_POST['name'];
    $semesters=$_POST['semesters'];
    $prequality=$_POST['prequality'];
    $rating=0.0;
    $status=0;
    $sql="INSERT INTO `Course` (`Course_id`, `Name`, `Semesters`, `Prequality`, `Rating`, `Status`) VALUES 
    (NULL, '$name', '$semesters', $prequality, NULL, NULL)" ;
          echo $sql;
   $d=mysqli_query($dbcon,$sql);
    if($d){
        echo '<script>alert("Course Added")</script>';
        header('location:./course.php');

    }
        else{
        echo '<script>alert("try again")</script>';
    header('location:./course.php');   }  
   }
?>