<?php
session_start();
if(!isset($_SESSION['UserName'])){
    echo "Working";
    header('location:./login.html');
}
?>
<html>
    <head>
        <title>Course Recommender</title>
        <link rel="stylesheet" href="Style1.css">
        <link rel="stylesheet" href="../tables.css">
        <link rel="stylesheet" href="profile.css">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <script src="changediv.js"></script>
        <style>
            

/* Add more styles as needed */


        </style>
    </head>
    <body>
        <header class="header">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav">
                <ul class="ulist">
                <li class="list"><a class="link" href="index1.php">Home</a></li>
                    <li class="list"><a class="link" href="courseview.php">Courses</a></li>
                    <li class="list"><a class="link" href="collegemanager.php">Colleges</a></li>
                    <li class="list"><a class="link" href="CCmanage.php">College Courses</a></li>
                    <li class="list"><a class="link" href="jobview.php">Jobs</a></li>
                    <li class="list"><a class="link" href="profile.php">Profile</a></li>
                    <li class="list"><a class="link" href="./report.php" >Interested</a></li>
                </ul>
            </nav>
    </header>
    <nav class="nav2">
        <form action="logout.php" method="post">
            <input type="submit" name=logout value="lout" class="logout">
        </form>
    </nav>
    <main class="" id="content">
        <?php
       //     session_start();
            require '../connection.php';
            $id=$_SESSION['id'];
            $sql="SELECT * FROM Student WHERE Studentid=$id";
            $data=mysqli_query($dbcon,$sql);
            if($data){
                $row=mysqli_fetch_array($data);
                $college=$row['Collegeid'];
                $course=$row['Courseid'];
                $job=$row['Jobid'];
                $intrest=$row['Intrestid'];
                $sql2="SELECT Name FROM College WHERE Collegeid=$college";
                $sql3="SELECT Name FROM Course WHERE Courseid=$course";
                $sql4="SELECT Name FROM Job WHERE Jobid=$job";
                $sql5="SELECT Name FROM Intrest WHERE Intrestid=$intrest";
                $data2=mysqli_query($dbcon,$sql2);
                $data3=mysqli_query($dbcon,$sql3);
                $data4=mysqli_query($dbcon,$sql4);
                $data5=mysqli_query($dbcon,$sql5);
                $row2=mysqli_fetch_array($data2);
                $row3=mysqli_fetch_array($data3);
                $row4=mysqli_fetch_array($data4);
                $row5=mysqli_fetch_array($data5);
                $_SESSION['email']=$row['Email'];
                echo '<div class="profile">
                    <h1>' . $row['Name'] . '</h1>
                    <p class="info">Id: ' . $row['Studentid'] . '</p>
                    <p class="info">Email: ' . $row['Email'] . '</p>
                    <p class="info">Year of passing: ' . $row['Year'] . '</p>';
                    if(mysqli_num_rows($data2)>0){
                    echo '<p class="info">College: ' . $row2['Name'] . '</p>';}
                    else{
                        // echo '<p class="info">College has been deleted</p>';
                    }
                    if(mysqli_num_rows($data3)>0){
                    echo '<p class="info">Course: ' . $row3['Name'] . '</p>';}

                if ($row['Jobid'] > 0) {
                    if(mysqli_num_rows($data2)>0){
                    echo '<p class="info">Job: ' . $row4['Name'] . '</p>';}
                }
                else{
                    echo '<p class="info">Job: Not Mentioned</p>';
                }

                echo '<p class="info">Interest: ' . $row5['Name'] . '</p>
                <a href="profileupdate.php"><button class="update">Update Profile</button></a>     
                <button onclick="clickButton()" class="delete">Delete Profile</button>
                <a href="./delete.php" id="myButton"></a>
                </div>';


                
            }
        ?>
        
                
        <!-- <button  onclick="clickButton()">
            Click me!
        </button>
        <a href="../show.php" id="myButton"></a> -->
<script>
    // function clickButton() {
    //     // Get the button element by its ID
    //     var button = document.getElementById('myButton');

    //     // Trigger a click on the button
    //     button.click();
    // }
</script>
    </main>
    <footer class="footer" style="margin: top 50px;">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>
<script>
        function clickButton() {
            // Get the button element by its ID
            const c = confirm("Do you want to delete Your Account");
            if(c){
            var button = document.getElementById('myButton');

            // Trigger a click on the button
            button.click();}
        }
</script>