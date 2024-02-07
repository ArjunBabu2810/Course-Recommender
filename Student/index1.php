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
        <link rel="stylesheet" href="recom.css">
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
    <main class="mainbox1" id="content">
    <div class="container">
<?php
    require '../connection.php';
    echo '<form action="" method="post" class="form2">
    <span>Select Course
    <select name="Course" id="Course">';
        $sql="SELECT Courseid,Name FROM Course";
        $data=mysqli_query($dbcon,$sql);
        
        if($data){
            $nrows=mysqli_num_rows($data);
            while($row=mysqli_fetch_array($data)){
                echo'<option name=Course id=Course value="'.$row['Courseid'].'">'.$row['Name'].'</option>';
            }
        }
    echo'</select>
    </span>
    <span>Select Intrest
    <select name="Intrest" id="Intrest">';
        $sql="SELECT * FROM Intrest";
        $data=mysqli_query($dbcon,$sql);
        
        if($data){
            $nrows=mysqli_num_rows($data);
            while($row=mysqli_fetch_array($data)){
                echo'<option name=Intrest id=Intrest value="'.$row['Intrestid'].'">'.$row['Name'].'</option>';
            }
        }
    echo'</select>
    </span>
    <input type="submit" value="Search" Name="Search" class="search">
    <input type="HIDDEN" name="job" id="job" value="1">
    </form>';
?>
<?php
    if(isset($_POST['Search']))
    {$Course=$_POST['Course'];
    $Intrest=$_POST['Intrest'];
    if(isset($_POST['job']))
    $r=$_POST['job'];
    else
    $r=0;
    $sql="SELECT Courseid,Name,Rating FROM Course WHERE (Prequality=$Course OR Prequality=0) 
            AND (Intrestid=$Intrest OR Intrestid=1) AND Status=1 ORDER BY Rating DESC";
            //echo $sql;
    $data=mysqli_query($dbcon,$sql);

    if($data){
        $nrows=mysqli_num_rows($data);
        echo '<table>
                <tr>
                <th>Courseid</th>
                <th>Course</th>
                <th>Rating</th>
                <th>Jobs</th>
                </tr>';
        while($row=mysqli_fetch_array($data)){
            $pre=$row['Courseid'];
            $buttonId = 'Showtable' . $pre;
            $tableId = 'table' . $pre;
            $sql2="SELECT Name,Rating FROM Job WHERE (Courseid=$pre OR Courseid=0) AND Status=1 ORDER BY Rating DESC";
            $data2=mysqli_query($dbcon,$sql2);
            echo '<tr><td>'.$row['Courseid'].'</td><td>'.$row['Name'].'</td><td>'.$row['Rating'].'</td>
                <td>
                <button id="'.$buttonId.'">Show Table</button>
                <div id="'.$tableId.'" style="display:none;">
                <table >
                    <tr>
                    <th>Name</th>
                    <th>Rating</th>
                    </tr>';
            while($row2=mysqli_fetch_array($data2)){
                echo '<tr><td>'.$row2['Name'].'</td><td>'.$row2['Rating'].'</td></tr>';
            }
            echo '</table></div></td>
                    <td><a href="cincolleges.php?cid='.$row['Courseid'].'"><button>List Colleges</button></a></td>';
                    $sql2 = 'SELECT Student_id, Course_id FROM Intrested WHERE Student_id='.$_SESSION['id'].' AND Course_id='.$row['Courseid'].'';
                        //echo $sql2;
                        $data2 = mysqli_query($dbcon, $sql2);

                        if ($data2) { // Check if the query was successful
                            if(mysqli_num_rows($data2)>0){
                                echo '<td><a href="interested.php?Courseid='.$row['Courseid'].'"><button class="update">Marked</button></a></td>';
                            }else{
                                echo '<td><a href="interested.php?Courseid='.$row['Courseid'].'"><button class="update">Interested</button></a></td>';

                            }
                        } else {
                            echo "Error in the query: " . mysqli_error($dbcon);
                        }
          //  echo '   <td><a href="interested.php?Courseid='.$row['Courseid'].'"><button class="update">Interested</button></a></td>';
             echo '       </tr>';
        }
        echo '</table>';
    }}
?>
</main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>
<script>
    // Add event listeners for each button
    <?php
    $data=mysqli_query($dbcon,$sql);
    while($row=mysqli_fetch_array($data)){
        $pre=$row['Courseid'];
        $buttonId = 'Showtable' . $pre;
        $tableId = 'table' . $pre;
        echo 'document.getElementById("'.$buttonId.'").addEventListener("click", function(){
            var tablecontainer=document.getElementById("'.$tableId.'");
            if(tablecontainer.style.display === "none"){
                tablecontainer.style.display="block";
            }
            else{
                tablecontainer.style.display="none";
            }
        });';
    }
    ?>
</script>
