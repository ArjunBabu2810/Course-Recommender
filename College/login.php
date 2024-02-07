
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="../common.css"> -->
    <link rel="stylesheet" href="login1.css">
    <link rel="stylesheet" href="login.css">
    <style>
        

    </style>
</head>
<body>
    <header class="header">
        <h1>Course Recommender</h1>
    </header>
    <div class="main-container">

<?php
    require '../connection.php';
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * FROM `College` WHERE Email = '$email'";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            $rows=mysqli_num_rows($data);
            if($rows>0){
                $row=mysqli_fetch_array($data);
                if($password==$row['Password']){
                    if($row['Status']==1){
                    echo $row['Name'];
                    session_start();
                    $_SESSION['UserName']=$row['Name'];
                    $_SESSION['Collegeid']=$row['Collegeid'];
                    header('location:../College/index1.php'); 
                    echo "hai".$row['Name'];
                    }
                    else{
                        echo "<h1>Application Not approved</h1>";
                    }
                }
                else{
                    echo "<h3>Wrong Password Or Email id</h3>";
                    echo '<p><a href="login.html"><button class="button">Try Again</button></a></p>';
                    echo "<h3>Don't Have an Account</h3>";
                    echo '<p><a href="signup.html"><button class="button">Sign Up</button></a></p>';
                }
            }
            else{
                echo "<h3>Wrong Password Or Email id</h3>";
                echo '<p><a href="login.html"><button class="button">Try Again</button></a></p>';
                echo "<h3>Don't Have an Account</h3>";
                echo '<p><a href="signup.html"><button class="button">Sign Up</button></a></p>';
            }
        }
    }
?>
</div>

<!-- <script src="login.js"></script> -->
</body>
</html>