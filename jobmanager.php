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
    <a href="job.php"><Button class="btn btn-outline-primary">Insert</Button></a>
    <div class="table-responsive">
        <?php
            require './connection.php' ;
            $sql="select * from Job";
            $data=mysqli_query($dbcon,$sql);
            if($data){
              //  echo "values";
                echo '<table class="table table-bordered table-hover">
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Course id</th>
                        <th>Launch Date</th>
                        <th>Rating</th>
                        <th>Status</th>
                        </tr>';
                $r=mysqli_num_rows($data);
                for($i=0;$i<$r;$i++){
                    $row=mysqli_fetch_array($data);
                    if($row['Status']==1){
                        echo '<tr >';
                       }
                       else{
                        echo '<tr style="background-color: red;">';
    
                       }
                    echo '<form action="jobud.php" method="post">
                            <td><input type="text" name="Jobid" value="'.$row['Jobid'].'"></td>
                            <td><input type="text" name="Name" value="'.$row['Name'].'"></td>';
                    // echo '<td><input type="text" name="Courseid" value="'.$row['Courseid'].'"></td>';
                   echo ' <td><select name="Courseid" id="Courseid" class="option">
                    <option value="NULL">Not Required</option>';
                
                   // require './connection.php' ;
                    $sql3="select Courseid,Name from Course";
                    $data3=mysqli_query($dbcon,$sql3);
                    if($data3){
                        //echo "values";
                        $r3=mysqli_num_rows($data3);
                        for($i3=0;$i3<$r3;$i3++){
                            $row3=mysqli_fetch_array($data3);
                            if($row['Courseid']==$row3['Courseid']){
                                echo "<option value=".$row3['Courseid']." selected >".$row3['Name']."</option>";
                            }
                            else{
                            echo "<option value=".$row3['Courseid'].">".$row3['Name']."</option>";}
                        }
                    }
                    echo '        <td><input type="Date" name="date" value="'.$row['Date'].'"></td>
                            <td><input type="text" name="Rating" value="'.$row['Rating'].'"></td>
                            <td><input type="text" name="Status" value="'.$row['Status'].'"></td>
                            <td class="switcht"><input type="submit" name="update" value="update"class="update" ></td>
                            <td class="switcht"><input type="submit" name="delete" value="delete" class="delete"></td>
                            </form></tr>';
                }
                echo '</table>';
            }
            
        ?>
    </div>
    </main>
<footer class="footer">
    <p>&copy;Course Recommender System. All rights are reserved</p>
</footer>
</body>
</html>