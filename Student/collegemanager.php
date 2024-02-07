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
        background-color:white;
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
    <a href="collegerating.php"><button class="update" style="margin: 2em;">Rate Your College</button></a>
        <div class="college-container">
        <?php
            require '../connection.php';
            $sql = "SELECT * FROM College WHERE Status=1 ORDER BY Rating DESC";
            $data = mysqli_query($dbcon, $sql);
            if ($data) {
                echo '';
                $r = mysqli_num_rows($data);
                for ($i = 0; $i < $r; $i++) {
                    $row = mysqli_fetch_array($data);
                    echo '<div class="college-box">
                            <h3>' . $row['Name'] . '</h3>
                            <p><strong>Email:</strong> ' . $row['Email'] . '</p>
                            <p><strong>Phone:</strong> ' . $row['Phone'] . '</p>
                            <p><strong>Website:</strong> <a href="' . $row['Website'] . '">' . $row['Website'] . '</a></p>
                            <p><strong>Address:</strong> ' . $row['Address'] . '</p>
                            <p><strong>Place:</strong> ' . $row['Place'] . '</p>
                            <p><strong>Rating:</strong> ' . $row['Rating'] . '</p>';
                            $sql2 = 'SELECT Student_id, College_id FROM Intrested WHERE Student_id='.$_SESSION['id'].' AND College_id='.$row['Collegeid'].'';
                            //echo $sql2;
                            $data2 = mysqli_query($dbcon, $sql2);

                            if ($data2) { // Check if the query was successful
                                if(mysqli_num_rows($data2)>0){
                                    echo '<a href="interested.php?Collegeid='.$row['Collegeid'].'"><button class="update">Marked</button></a>';
                                }else{
                                    echo '<a href="interested.php?Collegeid='.$row['Collegeid'].'"><button class="update">Interested</button></a>';

                                }
                            } else {
                                echo "Error in the query: " . mysqli_error($dbcon);
                            }
                            echo'</div>';
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
