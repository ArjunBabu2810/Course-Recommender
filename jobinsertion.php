<?php
   require './connection.php';
   echo "hai";
   if(isset($_POST['submit'])) {
    //$courseid=mt_rand(100000,999999);
    $name=$_POST['name'];
    $prequality=$_POST['prequality'];
    $rating=$_POST['rating'];
    $status=$_POST['status'];
    $date=$_POST['date'];
    echo "$prequality";
    $sql="INSERT INTO `Job` (`Jobid`, `Name`, `Courseid`, `Rating`, `Status`, `Date`) 
    VALUES (NULL, '$name', $prequality, '$rating', '$status', '$date');" ;
          echo $sql;
   $d=mysqli_query($dbcon,$sql);
    if($d){
        echo '<script>alert("Job Added")</script>';
        header('location:./job.php');

    }
        else{
        echo '<script>alert("try again")</script>';
        header('location:./job.php');  
         } 
   }
?>