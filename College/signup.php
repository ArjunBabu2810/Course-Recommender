<?php
    require '../connection.php' ;
    if(isset($_POST['signup'])){
        //$stid=mt_rand(100000,999999);
        $email=$_POST['email'];
        $password=$_POST['password'];
        $phone=$_POST['phone'];
        $sql="SELECT * FROM College WHERE Email='$email' OR Phone =$phone;"; 
        echo "$sql";
        $data=mysqli_query($dbcon,$sql);
        if(mysqli_num_rows($data)>0){
            header('Location: signup.html?Error=Email already exists or phone');
        }
        //echo "$stid $name $email $password $course $college $intrest $year $job $phone";
       $sql="INSERT INTO `College` (`Collegeid`, `Email`, `Password`, `Phone`) 
            VALUES (NULL, '$email', '$password', '$phone');"; 
        echo "$sql";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert(" Added")</script>';
            session_start();
            $_SESSION['email']=$email;
            header('location:profileupdate.html');
        }
        else{
            echo '<script>alert("not Added")</script>';
            // header('location:signup.html');
            }
        
    }
?>