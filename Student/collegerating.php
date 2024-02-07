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
        <!-- <link rel="stylesheet" href="style.css"> -->
        <script src="changediv.js"></script>
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
    <main class="mainbox" id="content">
        <?php
            require '../connection.php';
            //session_start();
            $id=$_SESSION['id'];
            $sql="SELECT Collegeid FROM Student WHERE Studentid=$id";
            $data=mysqli_query($dbcon,$sql);
            $row=mysqli_fetch_array($data);
            $collegeid=$row['Collegeid'];
            $sql1="SELECT Name,Rating FROM College WHERE Collegeid=$collegeid";
            $data1=mysqli_query($dbcon,$sql1);
            if(mysqli_num_rows($data1)>0){
            $row1=mysqli_fetch_array($data1);
            echo '<form action="rate.php" method=post><table>
            <tr><th>College  Name</th>
            <th>Rating</th></tr>
            <tr><td>'.$row1['Name'].'</td>
            <td><input type="text" name="Rating" value="'.$row1['Rating'].'"></td>
            <td><input type="submit" name="Rate" value="rate" class="update"></td></tr></table>
            </form>';}
            else{
                echo "We regret to inform you that your college account has been deactivated or removed. ";
            }
        ?>
    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>