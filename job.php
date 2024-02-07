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

        .inputbox {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .option {
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
        <div class="box">
            <form action="jobinsertion.php" method="post" class="form">
                <div class="box2">
                    <h2 class="text-center mb-4">Enter Job Details</h2>
                    <div class="items">
                        <label for="name">Job Name</label>
                        <input class="inputbox form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="items">
                        <label for="date">Launch Date</label>
                        <input class="inputbox form-control" type="date" name="date" id="date" required>
                    </div>
                    <div class="items">
                        <label for="prequality">Prequality</label>
                        <select name="prequality" id="prequality" class="option form-control">
                            <option value="NULL">Not Required</option>
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
                        <label for="rating">Rating</label>
                        <input class="inputbox form-control" type="text" name="rating" id="rating" required>
                    </div>
                    <div class="items">
                        <label>Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="available" value="1">
                            <label class="form-check-label" for="available">Available</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="notAvailable" value="0" checked>
                            <label class="form-check-label" for="notAvailable">Not available</label>
                        </div>
                    </div>
                    <button class="sbutton btn btn-primary btn-block" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </main>
    
    <footer class="footer">
    <p>&copy;Course Recommender System. All rights are reserved</p>
</footer>
</body>
</html>