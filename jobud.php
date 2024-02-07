<?php
   require './connection.php';
   echo "hai";
   if(isset($_POST['update'])) {
        $jobid=$_POST['Jobid'];
        $name=$_POST['Name'];
        $date=$_POST['date'];
        $prequality=$_POST['Courseid'];
        $rating=$_POST['Rating'];
        $status=$_POST['Status'];
        $sql="UPDATE `job` SET `Name` = '$name', `Courseid` = '$prequality',`Date` = '$date', 
            `Rating` = '$rating', `Status` = '$status' WHERE `job`.`Jobid` = $jobid";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert("Job updated")</script>';
            header('location:./jobmanager.php'); 

        }
        else {
            echo '<script>alert("Not updated")</script>';
            header('location:./jobmanager.php'); 

        }
   }
   elseif (isset($_POST['delete'])) {

    $jobid=$_POST['Jobid'];
    mysqli_query($dbcon, "DELETE FROM Intrested WHERE Job_id = $jobid");
    $sql="DELETE FROM Job WHERE `Job`.`Jobid` = $jobid";
    $data=mysqli_query($dbcon,$sql);
    if($data){
        echo '<script>alert("job deleted")</script>';
        header('location:./jobmanager.php'); 

    }
    else{
        echo '<script>alert("not deleted")</script>';
        header('location:./jobmanager.php'); 

    }    
}
?>