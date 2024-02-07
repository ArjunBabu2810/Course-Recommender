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
            $sql="SELECT Collegeid,Courseid FROM Student WHERE Studentid=$id";
            $data=mysqli_query($dbcon,$sql);
            $row=mysqli_fetch_array($data);
            $collegeid=$row['Collegeid'];
            $courseid=$row['Courseid'];
            $sql1="SELECT CCid,Rating FROM CollegeCourse WHERE Collegeid=$collegeid AND Courseid=$courseid";
            $sql2="SELECT Name FROM College WHERE Collegeid=$collegeid";
            $sql3="SELECT Name FROM Course WHERE Courseid=$courseid";
            $data1=mysqli_query($dbcon,$sql1);
            $data2=mysqli_query($dbcon,$sql2);
            $data3=mysqli_query($dbcon,$sql3);
            $row1=mysqli_fetch_array($data1);
            $row2=mysqli_fetch_array($data2);
            $row3=mysqli_fetch_array($data3);
            $rows=mysqli_num_rows($data1);
            if($rows>0){
                echo '<form action="ccrate.php" method=post><table>
                <tr><th>College</th>
                <th>Course</th>
                <th>Rating</th></tr>
                <tr><td>'.$row2['Name'].'</td>
                <td>'.$row3['Name'].'</td>
                <td><input type="text" name="Rating" value="'.$row1['Rating'].'"></td>
                <td><input type="submit" name="Rate" value="rate" class="update"></td></tr></table>
                <input type="hidden" name="ccid" value="'.$row1['CCid'].'">
                </form>';
            }
            else{
                if(mysqli_num_rows($data2)>0 && mysqli_num_rows($data3)>0){
                echo "There is No ".$row3['Name']." Course in College ".$row2['Name'];}
                else{
                    echo "Sorry the College or Course has been removed";
                }
            }
        ?>
    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>


