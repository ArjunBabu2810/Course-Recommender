<?php
   require '../connection.php';
   echo "hai";
   if(isset($_POST['submit'])) {
    //$courseid=mt_rand(100000,999999);
    $name=$_POST['name'];
    $prequality=$_POST['prequality'];
    $rating=$_POST['rating'];
    $status=$_POST['status'];
    echo "$status";
    $sql="INSERT INTO `Job` (`Name`, `Course_id`, `Rating`, `Status`) 
        VALUES ('$name','$prequality', '$rating', '$status');" ;
          echo $sql;
   $d=mysqli_query($dbcon,$sql);
    if($d){
        echo '<script>alert("Course Added")</script>';
        header('location:./job.php');

    }
        else{
        echo '<script>alert("try again")</script>';
        header('location:./job.php');  
         } 
   }
?>