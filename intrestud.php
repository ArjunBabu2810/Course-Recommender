<?php
   require './connection.php';
   echo "hai";
   if(isset($_POST['update'])) {
        $intrestid=$_POST['Intrestid'];
        $name=$_POST['Name'];
        $sql="UPDATE `Intrest` SET `Name` = '$name' WHERE `Intrest`.`Intrestid` = $intrestid";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert("Intrest updated")</script>';
            header('location:./intrestmanage.php'); 

        }
        else {
            echo '<script>alert("Not updated")</script>';
            header('location:./intrestmanage.php'); 


        }
   }
   elseif (isset($_POST['delete'])) {

    $intrestid=$_POST['Intrestid'];
    $sql="DELETE FROM Intrest WHERE `Intrest`.`Intrestid` = $intrestid";
    $data=mysqli_query($dbcon,$sql);
    if($data){
        echo '<script>alert("Intrest deleted")</script>';
        header('location:./intrestmanage.php'); 
 

    }
    else{
        echo '<script>alert("not deleted")</script>';
        header('location:./intrestmanage.php'); 


    }    
}
?>