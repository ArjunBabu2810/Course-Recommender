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
        <style>
    .college-course-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .college-course-box {
        width: 300px;
        background-color: #f8f8f8;
        padding: 20px;
        margin: 10px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h3 {
        color: #333;
        margin-bottom: 10px;
    }

    p {
        margin: 5px 0;
    }

    .update {
        margin: 2em;
        padding: 10px;
        text-decoration: none;
        background-color: #0176c3;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .update:hover {
        background-color: #0176c3;
    }
</style>

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
    <a href="CCrating.php">
                    <button class="update" style="margin: 2em;">Rate Your College Course</button>
                  </a>
        <div class="college-course-container">
        <?php
            require '../connection.php';
        $sql = "SELECT * FROM CollegeCourse WHERE Status=1 ORDER BY Rating DESC";
        $data = mysqli_query($dbcon, $sql);
        
        if ($data) {
            echo '';
            
            $r = mysqli_num_rows($data);
            for ($i = 0; $i < $r; $i++) {
                $row = mysqli_fetch_array($data);
                echo '<div class="college-course-box">
                        <h3>College: ' . getCollegeName($row['Collegeid'], $dbcon) . '</h3>
                        <p>Course: ' . getCourseName($row['Courseid'], $dbcon) . '</p>';
                        if($row['Certificates'])
                            echo'  <p>Certificates: ' . $row['Certificates'] . '</p>';
                        else
                            echo '<p>Certificates: No Certificates</p>';
                        echo'<p>Seats: ' . $row['Seats'] . '</p>
                        <p>Rating: ' . $row['Rating'] . '</p>';
                        $sql2 = 'SELECT Student_id, CC_id FROM Intrested WHERE Student_id='.$_SESSION['id'].' AND CC_id='.$row['CCid'].'';
                        //echo $sql2;
                        $data2 = mysqli_query($dbcon, $sql2);

                        if ($data2) { // Check if the query was successful
                            if(mysqli_num_rows($data2)>0){
                                echo '<a href="interested.php?CCid='.$row['CCid'].'"><button class="update">Marked</button></a>';
                            }else{
                                echo '<a href="interested.php?CCid='.$row['CCid'].'"><button class="update">Interested</button></a>';

                            }
                        } else {
                            echo "Error in the query: " . mysqli_error($dbcon);
                        }
                        
                      echo '</div>';
            }
        }
        
        function getCollegeName($collegeId, $dbcon) {
            $sql = "SELECT Collegeid, Name FROM College WHERE Collegeid = $collegeId";
            $data = mysqli_query($dbcon, $sql);
            
            if ($data) {
                $row = mysqli_fetch_array($data);
                if(mysqli_num_rows($data)>0){
                return $row['Name'];
                }
                else{
                    return "College has been deleted";    
                }
            } else {
                return "Unknown College";
            }
        }

        function getCourseName($courseId, $dbcon) {
            $sql = "SELECT Courseid, Name FROM Course WHERE Courseid = $courseId";
            $data = mysqli_query($dbcon, $sql);
            
            if ($data) {
                $row = mysqli_fetch_array($data);
                if(mysqli_num_rows($data)>0){
                    return $row['Name'];
                    }
                    else{
                        return "College has been deleted";    
                    }
            } else {
                return "Unknown Course";
            }
        }
            
        ?>
    </div>
    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>




<!-- echo '<tr><form action="courseud.php" method="post">
                            <td><input type="text" name="Courseid" value="'.$row['Courseid'].'"></td>
                            <td><input type="text" name="Name" value="'.$row['Name'].'"></td>
                            <td><input type="text" name="Semester" value="'.$row['Semester'].'"></td>
                            <td><input type="text" name="Prequality" value="'.$row['Prequality'].'"></td>
                            <td><input type="text" name="Rating" value="'.$row['Rating'].'"></td>
                            <td><input type="text" name="Status" value="'.$row['Status'].'"></td>
                            <td><input type="submit" name="update" value="update"></td>
                            <td><input type="submit" name="delete" value="delete"></td>
                            </form></tr>'; -->