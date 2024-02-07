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
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f0f0f0;
                margin: 0;
            }

            /* .mainbox {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            } */

            .box {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .box2 {
                text-align: center;
            }

            h2 {
                color: #333;
            }

            h4 {
                color: #666;
            }

            .form {
                display: flex;
                flex-direction: column;
            }

            .items1 {
                margin-bottom: 70px;
            }

            .option1 {
                width: 100%;
                padding: 10px;
                margin:10px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .inputbox1 {
                width: 100%;
                padding: 10px;
                margin-top:10px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .s1 {
                background-color: #0176c3;
                color: white;
                padding: 10px;
                margin:10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            .s1:hover {
                background-color: #0176c3;
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
                    <li class="list"><a class="link" href="college.php" >College</a></li>
                    <li class="list"><a class="link" href="#" >College Course</a></li>
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
    <div class="box">
        <form action="CCinsertion.php" method="post" class="form">
            <div class="box2">
                <h2>College Course</h2>
                <h4>Enter Courses in your College</h4>
        <span><?php //session_start();
        echo '<input type="hidden" name="Collegeid" value='.$_SESSION['Collegeid'].'>';?></span>
        <span class="items1">Course
            <select class="option1" name="courseid" id="courseid">
                <?php
                    require '../connection.php';
                    $sql="select Courseid,Name from Course";
                    $data=mysqli_query($dbcon,$sql);
                    if($data){
                        echo "values";
                        $r=mysqli_num_rows($data);
                        for($i=0;$i<$r;$i++){
                            $row=mysqli_fetch_array($data);
                            echo "<option value=".$row['Courseid'].">".$row['Name']."</option>";
                        }
                    }
                    
                ?>
            </select>
        </span>
        <span class="items">Number of seats :
            <input class="inputbox1" type="number" name=seats id="seats">
        </span>
        <span class="items">Launch Date :
            <input class="inputbox1" type="date" name=date id="date">
        </span>
        <span class="items">Certificates Provided :
            <input class="inputbox1" type="text" name=certificates id="certificates">
        </span>
        <input type="submit" value=submit name=submit class="s1">
        </div>
        </form>
        </div>
        </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>