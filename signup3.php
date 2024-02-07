<html>
    <head>
        <title>Login/Sign up</title>
        <!-- <link rel="stylesheet" href="signup.css"> -->
    </head>
    <body class="body">
        <form action="" method="post"> 
        <div>
        <div class="loginbox">
            <div class="loginbox2">
                <div class="boxform">
                <span class="heading">
                    Sign Up
                </span>
            </div>
            <span class="content">
                    <label for="name">name</label>
                    <input type="text" name="name" placeholder="name" class="box">
                </span>
                <span class="content">
                    <label for="username">email</label>
                    <input type="text" name="email" placeholder="email" class="box">
                </span>
                <span class="content">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="password" class="box">
                </span>
                <span class="content">
                    <label for="username">phone</label>
                    <input type="text" name="phone" placeholder="phone" class="box">
                </span>
                <div class="content2">
                
                <span class="buttons">
                    <input type="submit" value="SignUp" name="SignUp" class="switch">
                <!-- <a href="login.html"><button class="switch">Sign up</button></a> -->
                </span>
            </form>
                <span class="buttons"> 
                    <a href="login.html"><button class="switch">Login</button></a>
                </span>
                <span class="buttons">
                    <a href="forgot.php">Forgot password?</a>
                </span>
            </div>
            </div>
        </div>
    </div>

    </body>
</html>
<?php
    require './connection.php';
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $sql="INSERT INTO `Student` (`Studentid`, `Name`, `Email`, `Password`, `Courseid`, `Collegeid`, `Intrestid`, `Year`, `Jobid`, `Phone`)
         VALUES (NULL, '$name', '$email', '$password', NULL, NULL, NULL, NULL, NULL, '$phone');";
    $data=mysqli_query($dbcon,$sql);
    if($data){
        echo "Inserted";
    }
    else{
        echo "Not inserted";
    }
?>