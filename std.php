<?php
   require './connection.php';
   if (isset($_POST['delete'])) {

    $stid=$_POST['Studentid'];
    $sql="DELETE FROM Student WHERE `Student`.`Studentid` = $stid";
    $data=mysqli_query($dbcon,$sql);
    if($data){
        echo '<script>alert("deleted")</script>';
    }
    else{
        echo '<script>alert("not deleted")</script>';
    }    
}
?>