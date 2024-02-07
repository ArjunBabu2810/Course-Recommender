<?php
session_start();
if(!isset($_SESSION['UserName'])){
    echo "Working";
    header('location:../Login/login.html');
}
?>
<html>
    <head>
        <title>Course Recommender</title>
        <link rel="stylesheet" href="./College/Style.css">
        <link rel="stylesheet" href="tables.css">
        <link rel="stylesheet" href="bootstrap.css">
        <script src="changediv.js"></script>
        <style>
.college-course-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.college-course-container {
    background-color: #f8f8f8;
    padding: 20px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px; /* Adjust width as needed */
}

.form-group {
    display: flex;
    flex-direction: row;
    
    margin-bottom: 10px;
}

.label {
    font-weight: bold;
    padding: 8px;
    /* margin-bottom: 5px; */
}

.input {
    /* width: 100%; */
    padding: 8px;
    box-sizing: border-box;
}

.switcht {
    display: flex;
    justify-content: space-between;
}

.update,
.delete {
    padding: 8px 12px;
    text-decoration: none;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    background-color: #0176c3; /* Green for update, adjust as needed */
}

        </style>
    </head>
    <body>
        <header class="header">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav d-flex justify-content-center">
                <ul class="ulist">
                    <li class="list"><a class="link" href="./Index/index.php" >Home</a></li>
                    <li class="list"><a class="link" href="./Adminmanage.php" >Admin</a></li>
                    <li class="list"><a class="link" href="./coursemanage.php" >Course</a></li>
                    <li class="list"><a class="link" href="./collegemanager.php" >College</a></li>
                    <li class="list"><a class="link" href="./CCmanage.php" >College Course</a></li>
                    <li class="list"><a class="link" href="./intrestmanage.php" >Intrest</a></li>
                    <li class="list"><a class="link" href="./jobmanager.php" >Job</a></li>
                    <li class="list"><a class="link" href="./studentmanage.php" >Students</a></li>
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
    <a href="CollegeCourse.php" class="btn btn-outline-primary">Insert</a>
    <form action="collegecourseud.php" method="post">
        <br><input type="submit" value="Approve all" name="approveall" class="btn btn-outline-primary">
    </form>
    <div class="college-course-list">
        <?php
        
            require './connection.php';
            $sql = "SELECT * FROM CollegeCourse";
            $data = mysqli_query($dbcon, $sql);
    
            if ($data) {
                $r = mysqli_num_rows($data);
                for ($i = 0; $i < $r; $i++) {
                    $row = mysqli_fetch_array($data);
                    if($row['Status']==1)
                        echo '<div class="college-course-container">';
                    else{
                    echo '<div class="college-course-container" style="background-color:lightcoral;">';}
                            echo '<form action="collegecourseud.php" method="post">
                                <div class="form-group">
                                    <label class="label">ID:</label>
                                    <input class="input" type="text" name="CCid" value="'.$row['CCid'].'">
                                </div>';
    
                    $college = $row['Collegeid'];
                    $course = $row['Courseid'];
                    $sqlc = "SELECT Collegeid,Name FROM `College` WHERE Collegeid = $college";
                    $dc = mysqli_query($dbcon, $sqlc);
                    if ($dc && (mysqli_num_rows($dc)>0)) {
                        $rowc = mysqli_fetch_array($dc);
                        echo '<div class="form-group">
                                <label class="label">College ID:</label>';
                                // echo '<input class="input" type="text" name="Collegeid" value="'.$rowc['Collegeid'].'">';
                                echo '<select class="form-control" name="Collegeid" id="Collegeid">';
                                $sql9 = 'SELECT Collegeid,Name FROM College';
                                $result = mysqli_query($dbcon,$sql9) or die("Error in querying database");
                                while ($row9 = mysqli_fetch_array($result)) {
                                    if ($row9["Collegeid"] == $rowc["Collegeid"])
                                    echo '<option value='.$row9['Collegeid'].' selected>'.$row9['Collegeid'].'</option>';
                                    else
                                    echo '<option value='.$row9['Collegeid'].' >'.$row9['Collegeid'].' '.$row9['Name'].'</option>';
                                }
                                echo ' </select>';
                            echo '    </div>';
                        echo '<div class="form-group">
                                <label class="label">College:</label>
                                <input class="input" type="text" name="College" value="'.$rowc['Name'].'">
                            </div>';
                    }
                    else{
                        echo '<div class="form-group">
                                <label class="label">College: Deleted</label>
                                
                            </div>';
                    }
    
                    $sqlco = "SELECT Courseid,Name FROM Course WHERE Courseid = $course";
                    $dco = mysqli_query($dbcon, $sqlco);
                    if ($dco) {
                        $rowco = mysqli_fetch_array($dco);
                        echo '<div class="form-group">
                                <label class="label">Course ID:</label>';
                                // echo '<input class="input" type="text" name="Courseid" value="'.$rowco['Courseid'].'">';
                                echo '<select class="form-control" name="Courseid" id="Courseid">';
                                $sql8 = 'SELECT Courseid,Name FROM Course';
                                $result = mysqli_query($dbcon,$sql8) or die("Error in querying database");
                                while ($row8 = mysqli_fetch_array($result)) {
                                    if ($row8["Courseid"] == $rowco["Courseid"])
                                    echo '<option value='.$row8['Courseid'].' selected>'.$row8['Courseid'].'</option>';
                                    else
                                    echo '<option value='.$row8['Courseid'].' >'.$row8['Courseid'].' '.$row8['Name'].'</option>';
                                }
                                echo ' </select>';
                            echo '</div>';
                        echo '<div class="form-group">
                                <label class="label">Course:</label>
                                <input class="input" type="text" name="Course" value="'.$rowco['Name'].'">
                            </div>';
                    } else {
                        echo "dco not worked";
                    }
    
                    echo '<div class="form-group">
                            <label class="label">Seats:</label>
                            <input class="input" type="text" name="Seats" value="'.$row['Seats'].'">
                        </div>';
                    echo '<div class="form-group">
                        <label class="label">Launch Date:</label>
                        <input class="input" type="date" name="date" value="'.$row['Date'].'">
                         </div>';
                    echo '<div class="form-group">
                            <label class="label">Rating:</label>
                            <input class="input" type="text" name="Rating" value="'.$row['Rating'].'">
                        </div>';
                    echo '<div class="form-group">
                            <label class="label">Status:</label>
                            <input class="input" type="text" name="Status" value="'.$row['Status'].'">
                        </div>';
    
                    echo '<div class="switcht" style="background-color=rgb(255, 118, 118);">
                            <input type="submit" name="update" value="update"  class="btn btn-warning">
                            <input type="submit" name="delete" value="delete" class="btn btn-danger">
                          </div>
                        </form>
                        </div>';
                }
    
                echo '';
            }
            ?>
    </div>
    
    <?php
    
    ?>
   

    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>