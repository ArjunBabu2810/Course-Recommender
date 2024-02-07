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
        <link rel="stylesheet" href="tables.css".css">
        <script src="changediv.js"></script>
        <style>
        body {
            background-color: #f8f9fa;
        }

        .mainbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .box2 {
            max-width: 400px;
            margin: auto;
        }

        .items {
            display: block;
            margin-bottom: 15px;
        }

        .option {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .inputbox {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .sbutton {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .sbutton:hover {
            background-color: #0056b3;
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
                    <li class="list"><a class="link" href="./report.php" >Intrested</a></li>
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
                    <h2 class="text-center mb-4">College Course</h2>
                    <div class="items">
                        <label for="collegeid">College</label>
                        <select class="option form-control" name="collegeid" id="collegeid">
                            <?php
                            require './connection.php';
                            $sql = "select Collegeid,Name from College";
                            $data = mysqli_query($dbcon, $sql);
                            if ($data) {
                                $r = mysqli_num_rows($data);
                                for ($i = 0; $i < $r; $i++) {
                                    $row = mysqli_fetch_array($data);
                                    echo "<option value=" . $row['Collegeid'] . ">" . $row['Name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="items">
                        <label for="courseid">Course</label>
                        <select class="option form-control" name="courseid" id="courseid">
                            <?php
                            require './connection.php';
                            $sql = "select Courseid,Name from Course";
                            $data = mysqli_query($dbcon, $sql);
                            if ($data) {
                                $r = mysqli_num_rows($data);
                                for ($i = 0; $i < $r; $i++) {
                                    $row = mysqli_fetch_array($data);
                                    echo "<option value=" . $row['Courseid'] . ">" . $row['Name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="items">
                        <label for="seats">Number of seats</label>
                        <input class="inputbox form-control" type="number" name="seats" id="seats">
                    </div>
                    <div class="items">
                        <label for="date">Launch Date</label>
                        <input class="inputbox form-control" type="date" name="date" id="date">
                    </div>
                    <input type="submit" value="Submit" name="submit" class="sbutton btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>