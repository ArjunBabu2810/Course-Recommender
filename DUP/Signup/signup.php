<?php
    require './connection.php' ;
    if(isset($_POST['signup'])){
        $stid=mt_rand(100000,999999);
        $name=$_POST['name'];
        $email=$_POST['Email'];
        $password=$_POST['password'];
        $course=$_POST['course'];
        $college=$_POST['college'];
        $intrest=$_POST['intrest'];
        $year=$_POST['year'];
        $job=$_POST['job'];
        $phone=$_POST['phone'];
        echo "$stid $name $email $password $course $college $intrest $year $job $phone";
       /*  INSERT INTO `Student` (`Student_id`, `Name`, `Email`, `Password`, `Course_id`, `College_id`, `Intrest_id`, `Year`, `Job_id`, `Phone`) VALUES 
                              ('$stid', '$name', '$email', '$password', '$course', '$college', '$intrest', '$year', '$job', '$phone');  */
    }
?>