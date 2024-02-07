<?php
    require '../connection.php';
    if(isset($_POST['reset'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * FROM SuperUser WHERE Email='$email'";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            $rows=mysqli_num_rows($data);
                $row=mysqli_fetch_array($data);
                if($email==$row['Email']){
                    $sqlu="UPDATE `superuser` SET `Password` = '$password' WHERE `superuser`.`Email` = '$email';";
                    $data2=mysqli_query($dbcon,$sqlu);
                    if($data2){
                        echo '<script>alert("Updated")</script>';
                        session_start();
                        $_SESSION['UserName']=$row['Name'];
                        header('location:../Index/index.php');
                    }
                    else{
                        echo '<script>alert("not updated")</script>';
                    }
                }
            }
        }
?>