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
        <link rel="stylesheet" href="style.css">
        <script src="changediv.js"></script>
        <style>
    .course-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Adjust as needed */
    }

    .course-box {
        width: 30%; /* Adjust the width as needed */
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
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
        color:black;
    }

        </style>
    </head>
    <body>
        <header class="header">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav">
                <ul class="ulist">
                    <li class="list"><a class="link" href="index1.php" >Home</a></li>
                    <li class="list"><a class="link" href="#" >Course</a></li>
                    <li class="list"><a class="link" href="college.php" >College</a></li>
                    <li class="list"><a class="link" href="CCmanage.php" >College Course</a></li>
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
    <a href="course.php"><button class="button">Insert</button></a>
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
                            <p><strong>Launch Date:</strong> '.$row['Date'].'</p>
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
                    <p><strong>Rating:</strong>'.$row['Rating'].'</p></div>';
                }
            }
             echo '</div>';
             $data = mysqli_query($dbcon, $sql);
             echo'<h3><strong>Courses Not Approved</strong></h3>
                <div class="course-container" >';
             while ($row = mysqli_fetch_array($data)) {
                
                if ($row['Status'] == 0) {
                    $int = $row['Intrestid'];

                    echo '<div class="course-box" style="background-color: rgb(255, 112, 112);">
                            <h3>'.$row['Name'].'</h3>
                            <p><strong>ID:</strong> '.$row['Courseid'].'</p>
                            <p><strong>Semesters:</strong> '.$row['Semester'].'</p>
                            <p><strong>Launch Date:</strong> '.$row['Date'].'</p>
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
                    
                    echo '</p></div>';
                }
            }
        }
    ?>
    

    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>
