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
 .college-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        justify-content: center;
    }

    .college-details {
        background-color: #f8f8f8;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .update,
    .delete {
        display: block;
        margin-top: 10px;
        padding: 8px 12px;
        text-decoration: none;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .update {
        background-color: #4caf50; /* Green */
    }

    .delete {
        background-color: #f44336; /* Red */
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
    <a href="college.html"><Button class="btn btn-outline-primary">Insert</Button></a>
    <form action="collegeud.php" method="post">
        <br><input type="submit" value="Approve all" name="approveall" class="btn btn-outline-primary">
    </form>
    <div class="college-list">
        <?php
           
            
            require './connection.php' ;
            $sql = "select * from College";
            $data = mysqli_query($dbcon, $sql);
            
            if ($data) {
                while ($row = mysqli_fetch_array($data)) {
                    if($row['Status']==1)
                    echo '<div class="college-details">';
                    else 
                    echo '<div class="college-details"style="background-color:lightcoral;"> ';
                    echo '<form action="collegeud.php" method="post">';
                    
                    echo '<label>ID: </label><input type="text" name="Collegeid" value="'.$row['Collegeid'].'"><br>';
                    echo '<label>Name: </label><input type="text" name="Name" value="'.$row['Name'].'"><br>';
                    echo '<label>Email: </label><input type="text" name="Email" value="'.$row['Email'].'"><br>';
                    echo '<label>Password: </label><input type="text" name="Password" value="'.$row['Password'].'"><br>';
                    echo '<label>Phone: </label><input type="text" name="Phone" value="'.$row['Phone'].'"><br>';
                    echo '<label>Est Date: </label><input type="date" name="date" value="'.$row['Date'].'"><br>';
                    echo '<label>Website: </label><input type="text" name="Website" value="'.$row['Website'].'"><br>';
                    echo '<label>Address: </label><input type="text" name="Address" value="'.$row['Address'].'"><br>';
                    echo '<label>Place: </label><input type="text" name="Place" value="'.$row['Place'].'"><br>';
                    echo '<label>Rating: </label><input type="text" name="Rating" value="'.$row['Rating'].'"><br>';
                    echo '<label>Status: </label><input type="text" name="Status" value="'.$row['Status'].'"><br>';
                    
                    echo '<input type="submit" name="update" value="Update" class="update">';
                    echo '<input type="submit" name="delete" value="Delete" class="delete">';
                    
                    echo '</form>';
                    echo '</div>';
                }
            }
    ?>
</div>
    </div>
    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>