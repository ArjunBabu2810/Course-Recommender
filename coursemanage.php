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
    <a href="course.php"><Button class="btn btn-outline-primary">Insert</Button></a>
    <form action="courseud.php" method="post">
        <br><input type="submit" value="Approve all" name="approveall" class="btn btn-outline-primary">
    </form>
        <div class="table-responsive">
        <?php
            require './connection.php' ;
            $sql="select * from Course";
            $data=mysqli_query($dbcon,$sql);
            if($data){
                //echo "values";
                echo '<table class="table table-bordered table-hover">
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Semester</th>
                        <th>Date</th>
                        <th>Prequality</th>
                        <th>Intrest</th>
                        <th>Rating</th>
                        <th>Status</th>
                        </tr>';
                $r=mysqli_num_rows($data);
               // echo $r;
                for($i=0;$i<$r;$i++){
                   // echo $i;
                    $row=mysqli_fetch_array($data);
                    $int=$row['Intrestid'];
                   // echo $int;
                   if($row['Status']==1){
                    echo '<tr >';
                   }
                   else{
                    echo '<tr style="background-color: red;" class="table-danger">';

                   }
                    echo '<form action="courseud.php" method="post">
                            <td><input type="text" name="Courseid" value="'.$row['Courseid'].'"></td>
                            <td><input type="text" name="Name" value="'.$row['Name'].'"></td>
                            <td><input type="text" name="Semester" value="'.$row['Semester'].'"></td>
                            <td><input type="date" name="date" value="'.$row['Date'].'"></td>
                            <td><select name="prequality" id="prequality" class="option">
                            <option value="NULL">Not Required</option>';
                        
                           // require './connection.php' ;
                            $sql3="select Courseid,Name from Course";
                            $data3=mysqli_query($dbcon,$sql3);
                            if($data3){
                                //echo "values";
                                $r3=mysqli_num_rows($data3);
                                for($i3=0;$i3<$r3;$i3++){
                                    $row3=mysqli_fetch_array($data3);
                                    if($row['Prequality']==$row3['Courseid']){
                                        echo "<option value=".$row3['Courseid']." selected >".$row3['Name']."</option>";
                                    }
                                    else{
                                    echo "<option value=".$row3['Courseid'].">".$row3['Name']."</option>";}
                                }
                            }
                        echo '</select></td>
                            <td>
                            <select name="intrest" id="intrest" class="option">
                             <option value="NULL">Not Required</option>';
                            //require './connection.php' ;
                            $sql2="select Intrestid,Name from Intrest";
                            $data2=mysqli_query($dbcon,$sql2);
                            if($data2){
                                //echo "values";
                                $r2=mysqli_num_rows($data2);
                                for($i2=0;$i2<$r2;$i2++){
                                    $row2=mysqli_fetch_array($data2);
                                    if($row['Intrestid']==$row2['Intrestid']){
                                    echo "<option value=".$row2['Intrestid']." selected >".$row2['Name']."</option>";}
                                    else{
                                        echo "<option value=".$row2['Intrestid'].">".$row2['Name']."</option>";
                                    }
                                }
                            }
                        echo '</select></td>
                            <td><input type="text" name="Rating" value="'.$row['Rating'].'"></td>
                            <td><input type="text" name="Status" value="'.$row['Status'].'"></td>
                            <td class="switcht"><input type="submit" name="update" value="update" class="btn btn-warning"></td>
                            <td class="switcht"><input type="submit" name="delete" value="delete" class="btn btn-danger"></td>
                            </form></tr>';
                            //echo $i;
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