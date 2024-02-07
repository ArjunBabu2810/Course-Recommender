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
            .college-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.college-form {
    background-color: #f8f8f8;
    padding: 20px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.form-field {
    margin-bottom: 10px;
}

.field-name {
    font-weight: bold;
    margin-right: 5px;
}

.button-group {
    margin-top: 15px;
}

.update-btn,
.delete-btn,
.insert-btn {
    padding: 8px 12px;
    margin-right: 10px;
    text-decoration: none;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.update-btn {
    background-color: #4caf50; /* Green */
}

.delete-btn {
    background-color: #f44336; /* Red */
}

.insert-btn {
    background-color: #3498db; /* Blue */
}

        </style>
    </head>
    <body>
        <header class="header">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav">
                <ul class="ulist">
                    <li class="list"><a class="link" href="index1.php" >Home</a></li>
                    <li class="list"><a class="link" href="courseview.php" >Course</a></li>
                    <li class="list"><a class="link" href="#" >College</a></li>
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
        <div>
        <?php
            //session_start();
            require '../connection.php';
            $id=$_SESSION['Collegeid']; 
            $sql="select * from College WHERE Collegeid = '$id'";
            $data=mysqli_query($dbcon,$sql);
            if($data){
                echo '<div class="college-list">';

                $r = mysqli_num_rows($data);
                
                for ($i = 0; $i < $r; $i++) {
                    $row = mysqli_fetch_array($data);
                    echo '<form action="collegeud.php" method="post" class="college-form">';
                    
                    // Display each field in a div with appropriate classes
                    echo '<div class="form-field"><span class="field-name">Id:</span> ' . $row['Collegeid'] . '<input type="hidden" name="Collegeid" value="' . $row['Collegeid'] . '"></div>';
                    echo '<div class="form-field"><span class="field-name">Name:</span> <input type="text" name="Name" value="' . $row['Name'] . '"></div>';
                    echo '<div class="form-field"><span class="field-name">Email:</span> <input type="text" name="Email" value="' . $row['Email'] . '"></div>';
                    echo '<div class="form-field"><span class="field-name">Password:</span> <input type="text" name="Password" value="' . $row['Password'] . '"></div>';
                    echo '<div class="form-field"><span class="field-name">Phone:</span> <input type="text" name="Phone" value="' . $row['Phone'] . '"></div>';
                    echo '<div class="form-field"><span class="field-name">Launch Date:</span> <input type="date" name="date" value="' . $row['Date'] . '"></div>';
                    echo '<div class="form-field"><span class="field-name">Website:</span> <input type="text" name="Website" value="' . $row['Website'] . '"></div>';
                    echo '<div class="form-field"><span class="field-name">Address:</span> <input type="text" name="Address" value="' . $row['Address'] . '
                    "style="height:100px;"></div>';
                    echo '<div class="form-field"><span class="field-name">Place:</span> <input type="text" name="Place" value="' . $row['Place'] . '"></div>';
                    
                    // Hidden fields
                    echo '<input type="hidden" name="Rating" value="' . $row['Rating'] . '">';
                    echo '<input type="hidden" name="Status" value="' . $row['Status'] . '">';
                    
                    // Buttons
                    echo '<div class="button-group">';
                    echo '<input type="submit" name="update" value="Update" class="update-btn">';
                    echo '<input type="submit" name="delete" value="Delete" class="delete-btn">';
                    echo '</div>';
                    
                    echo '</form>';
                }
                
                echo '</div>';
                
                echo '</div>';
                

            }
            
        ?>
    </div>
    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>