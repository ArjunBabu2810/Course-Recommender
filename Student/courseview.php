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
        <style>
                .course-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-arround; /* Adjust as needed */
        margin-bottom:100px;
    }

    .course-box {
        width: 30%; /* Adjust the width as needed */
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h3 {
        color: #333;
        margin-bottom: 10px;
    }

    p {
        margin: 5px 0;
    }

    strong {
        color: #555;
    }

    .button {
        background-color: #0176c3;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none;
    }

    .button:hover {
        background-color: #0176c3;
    }

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
    <main class="mainbox" id="content">
<a href="courserating.php"><button class="update" style="margin:2em;">Rate Your Course</button></a>

    <div class="course-container">
        <?php
        require '../connection.php';
        $sql = "SELECT * FROM Course ORDER BY Rating DESC";
        $data = mysqli_query($dbcon, $sql);
        
        if ($data) {
            while ($row = mysqli_fetch_array($data)) {
                if ($row['Status'] == 1) {
                    $int = $row['Intrestid'];

                    echo '<div class="course-box">
                            <h3>'.$row['Name'].'</h3>
                            <p><strong>ID:</strong> '.$row['Courseid'].'</p>
                            <p><strong>Semesters:</strong> '.$row['Semester'].'</p>
                            <p><strong>Prequality:</strong>';
                    
                    $sql3 = "SELECT Courseid, Name FROM Course";
                    $data3 = mysqli_query($dbcon, $sql3);
                    
                    if ($data3) {
                        $r3 = mysqli_num_rows($data3);
                        
                        for ($i3 = 0; $i3 < $r3; $i3++) {
                            $row3 = mysqli_fetch_array($data3);
                            if ($row['Prequality'] == $row3['Courseid']) {
                                echo $row3['Name'];
                            }
                        }
                    }
                    
                    echo '</p><p><strong>Interest:</strong> ';
                    
                    $sql2 = "SELECT Intrestid, Name FROM Intrest";
                    $data2 = mysqli_query($dbcon, $sql2);
                    
                    if ($data2) {
                        $r2 = mysqli_num_rows($data2);
                        
                        for ($i2 = 0; $i2 < $r2; $i2++) {
                            $row2 = mysqli_fetch_array($data2);
                            if ($row['Intrestid'] == $row2['Intrestid']) {
                                echo $row2['Name'];
                            }
                        }
                    }
                    
                    echo '</p>
                    <p><strong>Rating:</strong>'.$row['Rating'].'</p>';
                    $sql2 = 'SELECT Student_id, Course_id FROM Intrested WHERE Student_id='.$_SESSION['id'].' AND Course_id='.$row['Courseid'].'';
                        //echo $sql2;
                        $data2 = mysqli_query($dbcon, $sql2);

                        if ($data2) { // Check if the query was successful
                            if(mysqli_num_rows($data2)>0){
                                echo '<a href="interested.php?Courseid='.$row['Courseid'].'"><button class="update">Marked</button></a>';
                            }else{
                                echo '<a href="interested.php?Courseid='.$row['Courseid'].'"><button class="update">Interested</button></a>';

                            }
                        } else {
                            echo "Error in the query: " . mysqli_error($dbcon);
                        }
                    echo '</div>';
                }
            }

            echo '';
        }
    ?>
    </div>
    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>