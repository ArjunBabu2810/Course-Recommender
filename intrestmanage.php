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
    <a href="intrest.html"><Button class="btn btn-outline-primary">Insert</Button></a>
    <div class="table-responsive">
        <?php
            require './connection.php' ;
            $sql="select * from Intrest";
            $data=mysqli_query($dbcon,$sql);
            if($data){
               // echo "values";
                echo '<table class="table table-bordered table-hover">
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        </tr>';
                $r=mysqli_num_rows($data);
                for($i=0;$i<$r;$i++){
                    $row=mysqli_fetch_array($data);
                    echo '<tr><form action="intrestud.php" method="post">
                            <td><input type="text" name="Intrestid" value="'.$row['Intrestid'].'"></td>
                            <td><input type="text" name="Name" value="'.$row['Name'].'"></td>
                            <td class="switcht"><input type="submit" name="update" value="update" class="update"></td>
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