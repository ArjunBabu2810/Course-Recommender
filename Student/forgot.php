<?php
    require '../connection.php';
    if(isset($_POST['reset'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * FROM Student WHERE Email='$email'";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            $rows=mysqli_num_rows($data);
                $row=mysqli_fetch_array($data);
                if($email==$row['Email']){
                    $sqlu="UPDATE `Student` SET `Password` = '$password' WHERE `Student`.`Email` = '$email';";
                    $data2=mysqli_query($dbcon,$sqlu);
                    if($data2){
                        echo '<script>alert("Updated")</script>';
                        session_start();
                        $_SESSION['UserName']=$row['Name'];
                        header('location:./index1.php');
                    }
                    else{
                        echo '<script>alert("not updated")</script>';
                    }
                }
            }
        }
?>