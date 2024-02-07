<?php
session_start();
if(!isset($_SESSION['UserName'])){
    echo "Working";
    header('location:../College/login.html');
}
?>
<html>
    <head>
        <title>Course Recommender</title>
        <link rel="stylesheet" href="Style.css">
        <link rel="stylesheet" href="tables.css">
        <script src="changediv.js"></script>
        <style>
            .college-course-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.college-course {
    background-color: #f8f8f8;
    padding: 20px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.course-name {
    font-weight: bold;
    margin-bottom: 10px;
}

.seats {
    margin-bottom: 10px;
}

.button-group {
    display: flex;
    justify-content: space-between;
}

.update-btn,
.delete-btn,
.insert-btn {
    padding: 8px 12px;
    text-decoration: none;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.update-btn {
    background-color: #4caf50; /* Green */
}

.delete-btn {
    background-color: #f44336; /* Red */
}

.insert-btn {
    background-color: #3498db; /* Blue */
}

        </style>
    </head>
    <body>
        <header class="header">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav">
                <ul class="ulist">
                    <li class="list"><a class="link" href="index1.php" >Home</a></li>
                    <li class="list"><a class="link" href="courseview.php" >Course</a></li>
                    <li class="list"><a class="link" href="college.php" >College</a></li>
                    <li class="list"><a class="link" href="#" >College Course</a></li>
                    <li class="list"><a class="link" href="report.php" >Interested</a></li>
                    
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
           // session_start();
            $id=$_SESSION['Collegeid'];
            require '../connection.php' ;
            $sql="select * from CollegeCourse where Collegeid='$id' AND `Status`=1";
            $data=mysqli_query($dbcon,$sql);
            if($data){
                echo '<a href="CollegeCourse.php" class="insert-btn" target=""_top>Insert</a>';
                echo '<div class="college-course-list">';

                $r = mysqli_num_rows($data);

                for ($i = 0; $i < $r; $i++) {
                    $row = mysqli_fetch_array($data);
                    echo '<div class="college-course" id="college_course_' . $row['CCid'] . '">
                            <form action="collegecourseud.php" method="post" class="college-course-form">
                                <input type="hidden" name="CCid" value="' . $row['CCid'] . '">';

                    $college = $row['Collegeid'];
                    $course = $row['Courseid'];

                    $sqlc = "SELECT Collegeid,Name FROM `College` WHERE Collegeid = $college";
                    $dc = mysqli_query($dbcon, $sqlc);

                    if ($dc) {
                        $rc = mysqli_num_rows($dc);
                        $rowc = mysqli_fetch_array($dc);
                        echo '<input type="hidden" name="Collegeid" value="' . $rowc['Collegeid'] . '">';
                        echo '<input type="hidden" name="College" value="' . $rowc['Name'] . '">';
                    }

                    $sqlco = "SELECT Courseid,Name FROM Course WHERE Courseid = $course";
                    $dco = mysqli_query($dbcon, $sqlco);

                    if ($dco) {
                        $rco = mysqli_num_rows($dco);
                        $rowco = mysqli_fetch_array($dco);
                        echo '<input type="hidden" name="Courseid" value="' . $rowco['Courseid'] . '">';
                        echo '<div class="course-name">' . $rowco['Name'] . '<input type="hidden" name="Course" value="' . $rowco['Name'] . '"></div>';
                    } else {
                        echo "dco not worked";
                    }

                    echo '<div class="seats"><label>Seats:</label> <input type="text" name="Seats" value="' . $row['Seats'] . '"></div>
                    <div class="seats"><label>Certificates:</label> <input type="text" name="certificates" value="' . $row['Certificates'] . '"></div>
                    <div class="seats"><label>Launch Date:</label> <input type="date" name="date" value="' . $row['Date'] . '"></div>
                        <input type="hidden" name="Rating" value="' . $row['Rating'] . '">
                        <input type="hidden" name="Status" value="' . $row['Status'] . '">
                        <div class="button-group">
                            <input type="submit" name="update" value="Update" class="update-btn">
                            <input type="submit" name="delete" value="Delete" class="delete-btn">
                        </div>
                        </form>
                    </div>';
                }

                echo '</div>';
                //echo '<a href="CollegeCourse.php" class="insert-btn">Insert</a>';

            }
                echo "<h1 style='color:red'>Courses Under Submission</h1>";
                $sql="select * from CollegeCourse where Collegeid='$id' AND `Status`=0";
                $data=mysqli_query($dbcon,$sql);
                $r = mysqli_num_rows($data);

                for ($i = 0; $i < $r; $i++) {
                    $row = mysqli_fetch_array($data);
                    echo '<div class="college-course" Style="background:rgb(255, 112, 112);" id="college_course_' . $row['CCid'] . '">
                            <form action="collegecourseud.php" method="post" class="college-course-form">
                                <input type="hidden" name="CCid" value="' . $row['CCid'] . '">';

                    $college = $row['Collegeid'];
                    $course = $row['Courseid'];

                    $sqlc = "SELECT Collegeid,Name FROM `College` WHERE Collegeid = $college";
                    $dc = mysqli_query($dbcon, $sqlc);

                    if ($dc) {
                        $rc = mysqli_num_rows($dc);
                        $rowc = mysqli_fetch_array($dc);
                        echo '<input type="hidden" name="Collegeid" value="' . $rowc['Collegeid'] . '">';
                        echo '<input type="hidden" name="College" value="' . $rowc['Name'] . '">';
                    }

                    $sqlco = "SELECT Courseid,Name FROM Course WHERE Courseid = $course";
                    $dco = mysqli_query($dbcon, $sqlco);

                    if ($dco) {
                        $rco = mysqli_num_rows($dco);
                        $rowco = mysqli_fetch_array($dco);
                        echo '<input type="hidden" name="Courseid" value="' . $rowco['Courseid'] . '">';
                        echo '<div class="course-name">' . $rowco['Name'] . '<input type="hidden" name="Course" value="' . $rowco['Name'] . '"></div>';
                    } else {
                        echo "dco not worked";
                    }

                    echo '<div class="seats"><label>Seats:</label> <input type="text" name="Seats" value="' . $row['Seats'] . '"></div>
                    <div class="seats"><label>Certificates:</label> <input type="text" name="certificates" value="' . $row['Certificates'] . '"></div>
                    <div class="seats"><label>Launch Date:</label> <input type="date" name="date" value="' . $row['Date'] . '"></div>
                        <input type="hidden" name="Rating" value="' . $row['Rating'] . '">
                        <input type="hidden" name="Status" value="' . $row['Status'] . '">
                        <div class="button-group">
                            <input type="submit" name="update" value="Update" class="update-btn">
                            <input type="submit" name="delete" value="Delete" class="delete-btn">
                        </div>
                        </form>
                    </div>';
                

                echo '</div>';
            }
            
        ?>
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