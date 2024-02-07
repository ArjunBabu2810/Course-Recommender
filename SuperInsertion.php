
<?php
   require './connection.php';
   echo "hai";
   if(isset($_POST['submit'])) {
    //$courseid=mt_rand(100000,999999);
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $password=$_POST['password'];
    $sql="INSERT INTO `Superuser` ( `Name`, `Email`, `Password`) 
    VALUES ('$name', '$email', '$password');" ;
          echo $sql;
   $d=mysqli_query($dbcon,$sql);
    if($d){
        echo '<script>alert("User Added")</script>';
       header('location:./1UserInsertion.html');

    }
        else{
        echo '<script>alert("try again")</script>';
        header('location:./1UserInsertion.html');  
         }  
   }
?>