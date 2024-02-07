
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
            .college-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .college-box {
        width: 300px;
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

    strong {
        color: #555;
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
    <a href="index1.php"><button class="update">Go Back</button></a>
        <div class="college-container">
            <?php
                require '../connection.php';
                $courseid = $_GET['cid'];
                $sql="SELECT DISTINCT Collegeid FROM `CollegeCourse` WHERE `Courseid`=$courseid AND `Status`= 1";
                $data=mysqli_query($dbcon,$sql);
                $n=mysqli_num_rows($data);

                // echo $n;
                while ($row=mysqli_fetch_array($data)){
                    $collegeid=$row['Collegeid'];
                    // echo $collegeid;
                    $sql4="SELECT Certificates,CCid FROM `CollegeCourse` WHERE `Courseid`=$courseid AND `Collegeid`= $collegeid";
                    $data4=mysqli_query($dbcon,$sql4);
                    $row4=mysqli_fetch_array($data4);
                    $sql3="SELECT Name FROM Course WHERE Courseid=$courseid";
                    $data3=mysqli_query($dbcon,$sql3);
                    $row3=mysqli_fetch_array($data3);
                    $sql2 = "SELECT * FROM College WHERE Status=1 AND Collegeid=$collegeid ORDER BY Rating DESC";
                    $data2 = mysqli_query($dbcon, $sql2);
                    if ($data2 && (mysqli_num_rows($data2)>0)) {
                        echo '';
                            $row2 = mysqli_fetch_array($data2);
                            echo '<div class="college-box">
                                    <h3>' . $row2['Name'] . '</h3>
                                    <h4>'.$row3['Name'].'</h4>
                                    <p><strong>Email:</strong> ' . $row2['Email'] . '</p>
                                    <p><strong>Phone:</strong> ' . $row2['Phone'] . '</p>
                                    <p><strong>Website:</strong> <a href="' . $row2['Website'] . '">' . $row2['Website'] . '</a></p>
                                    <p><strong>Address:</strong> ' . $row2['Address'] . '</p>
                                    <p><strong>Place:</strong> ' . $row2['Place'] . '</p>
                                    <p><strong>Certificates:</strong> ' . $row4['Certificates'] . '</p>
                                    <p><strong>Rating:</strong> ' . $row2['Rating'] . '</p>';
                                    $sql5 = 'SELECT Student_id, CC_id FROM Intrested WHERE Student_id='.$_SESSION['id'].' AND CC_id='.$row4['CCid'].'';
                                    //echo $sql2;
                                    $data5 = mysqli_query($dbcon, $sql5);

                                    if ($data5) { // Check if the query was successful
                                        if(mysqli_num_rows($data5)>0){
                                            echo '<a href="interested.php?CCid='.$row4['CCid'].'"><button class="update">Marked</button></a>';
                                        }else{
                                            echo '<a href="interested.php?CCid='.$row4['CCid'].'"><button class="update">Interested</button></a>';

                                        }
                                    } else {
                                        echo "Error in the query: " . mysqli_error($dbcon);
                                    }
                               echo' </div>';
                        
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