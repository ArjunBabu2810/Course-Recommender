<?php
    require './connection.php' ;
    if(isset($_POST['signup'])){
        //$stid=mt_rand(100000,999999);
        $name=$_POST['name'];
        $email=$_POST['Email'];
        $password=$_POST['password'];
        $course=$_POST['course'];
        $college=$_POST['college'];
        $intrest=$_POST['intrest'];
        $year=$_POST['year'];
        $job=$_POST['job'];
        $phone=$_POST['phone'];
        //echo "$stid $name $email $password $course $college $intrest $year $job $phone";
       $sql="INSERT INTO `Student` (`Studentid`, `Name`, `Email`, `Password`, `Courseid`, `Collegeid`, `Intrestid`, `Year`, `Jobid`, `Phone`) 
            VALUES (NULL, '$name', '$email', '$password', $course, $college, $intrest, '$year', $job, '$phone');"; 
        echo "$sql";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert(" Added")</script>';}
        else{
            echo '<script>alert("not Added")</script>';
            }
        
    }
?>