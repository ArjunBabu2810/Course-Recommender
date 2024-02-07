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
        <link rel="stylesheet" href="tables.css"">
        <script src="changediv.js"></script>
        <style>
    .students-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .student-details {
        flex: 0 1 calc(30% - 20px); /* Adjust the width as needed with margin */
        background-color: #f8f8f8;
        padding: 20px;
        margin: 10px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .label-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .label {
        flex: 1;
        margin-right: 10px;
        font-weight: bold;
    }

    .input-box {
        flex: 2;
        width: calc(100% - 16px); /* Adjust padding and width as needed */
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .delete {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
    }

    .delete:hover {
        background-color: #cc0000;
    }
</style>


    </head>
    <body>
        <header class="header">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav">
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
    <div class="students-container">
    <?php
                 
           
            require 'connection.php';
            $sql = "SELECT * FROM Student";
            $data = mysqli_query($dbcon, $sql);
    
            if ($data) {
                while ($row = mysqli_fetch_array($data)) {
                    echo '<div class="student-details">';
                    echo '<form action="std.php" method="post">';
    
                    echo '<div class="label-container">
                            <label class="label">ID:</label>
                            <input type="text" name="Studentid" class="input-box" value="'.$row['Studentid'].'">
                          </div>';
                    echo '<div class="label-container">
                            <label class="label">Name:</label>
                            <input type="text" name="Name" class="input-box" value="'.$row['Name'].'">
                          </div>';
                    echo '<div class="label-container">
                            <label class="label">Email:</label>
                            <input type="text" name="Email" class="input-box" value="'.$row['Email'].'">
                          </div>';
                    echo '<div class="label-container">
                            <label class="label">Password:</label>
                            <input type="text" name="Password" class="input-box" value="'.$row['Password'].'">
                          </div>';
    
                    $course = $row['Courseid'];
                    $sqlco = "SELECT Courseid,Name FROM Course WHERE Courseid = $course";
                    $dco = mysqli_query($dbcon, $sqlco);
    
                    if ($dco) {
                        if(mysqli_num_rows($dco)>0){
                        $rowco = mysqli_fetch_array($dco);
                        echo '<div class="label-container">
                                <label class="label">Course ID:</label>
                                <input type="text" name="Courseid" class="input-box" value="'.$rowco['Courseid'].'">
                              </div>';
                        echo '<div class="label-container">
                                <label class="label">Course:</label>
                                <input type="text" name="Course" class="input-box" value="'.$rowco['Name'].'">
                              </div>';
                        }
                        else{
                            echo '<div class="label-container">
                            <label class="label">Course ID:</label>
                            <input type="text" name="Courseid" class="input-box" value="Course has been deleted">
                          </div>';

                        }
                    }
    
                    $college = $row['Collegeid'];
                    $sqlc = "SELECT Collegeid,Name FROM `College` WHERE Collegeid = $college";
                    $dc = mysqli_query($dbcon, $sqlc);
    
                    if ($dc) {
                        if(mysqli_num_rows($dc)>0){
                        $rowc = mysqli_fetch_array($dc);
                        echo '<div class="label-container">
                                <label class="label">College ID:</label>
                                <input type="text" name="Collegeid" class="input-box" value="'.$rowc['Collegeid'].'">
                              </div>';
                        echo '<div class="label-container">
                                <label class="label">College:</label>
                                <input type="text" name="College" class="input-box" value="'.$rowc['Name'].'">
                              </div>';
                        }
                        else{
                            echo '<div class="label-container">
                                <label class="label">College ID:</label>
                                <input type="text" name="Collegeid" class="input-box" value="College has been deleted">
                              </div>';

                        }
                    }
    
                    echo '<div class="label-container">
                            <label class="label">Interest ID:</label>
                            <input type="text" name="Intrestid" class="input-box" value="'.$row['Intrestid'].'">
                          </div>';
                    echo '<div class="label-container">
                            <label class="label">Year:</label>
                            <input type="text" name="Year" class="input-box" value="'.$row['Year'].'">
                          </div>';
                    echo '<div class="label-container">
                            <label class="label">Job ID:</label>
                            <input type="text" name="Jobid" class="input-box" value="'.$row['Jobid'].'">
                          </div>';
                    echo '<div class="label-container">
                            <label class="label">Phone:</label>
                            <input type="text" name="Phone" class="input-box" value="'.$row['Phone'].'">
                          </div>';
    
                    echo '<input type="submit" name="delete" value="Delete" class="delete">';
    
                    echo '</form>';
                    echo '</div>';
                }
            }
        ?>
    </div>
        
    </body>
</html>