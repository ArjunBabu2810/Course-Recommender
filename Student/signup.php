<?php
    require '../connection.php';
    
    if(isset($_POST['signup'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $phone=$_POST['phone'];
        $date=date("y-m-d");

        // Check if the email or phone already exists
        $check_sql = "SELECT * FROM Student WHERE Email='$email' OR Phone='$phone'";
        $result = mysqli_query($dbcon, $check_sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("Email or Phone already exists. Please choose different credentials.")</script>';
            header('location:signup.html');
            exit(); // Stop further execution after redirection
        }

        // Proceed with the insertion if email and phone are unique
        $sql="INSERT INTO `Student` (`Studentid`,`Name`, `Email`, `Password`, `Phone`, `Date`) 
            VALUES (NULL,NULL,'$email', '$password', '$phone', '$date')"; 

        // Attempt to execute the query
        $data=mysqli_query($dbcon, $sql);

        if($data){
            echo '<script>alert("Added")</script>';
            session_start();
            $_SESSION['email']=$email;
            header('location:profileupdate.php');
        } else {
            $error_message = mysqli_error($dbcon); // Get the specific MySQL error message

            if (strpos($error_message, 'Duplicate entry') !== false) {
                echo '<script>alert("Duplicate entry for Phone. Please choose a different phone number.")</script>';
            } else {
                echo '<script>alert("Error: '.$error_message.'")</script>';
            }

            // header('location:signup.html');
            exit(); // Stop further execution after redirection
        }
    }
?>
