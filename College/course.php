<html>
    <head>
        <title>Course Recommender</title>
        <link rel="stylesheet" href="Style.css">
        <link rel="stylesheet" href="tables.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../bootstrap.css">
        <script src="changediv.js"></script>
    </head>
    <body>
        <header class="header">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav d-flex justify-content-center">
                <ul class="ulist">
                    <li class="list"><a class="link" href="index1.php" >Home</a></li>
                    <li class="list"><a class="link" href="courseview.php" >Course</a></li>
                    <li class="list"><a class="link" href="college.php" >College</a></li>
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
        <div class="container">
            <form action="Courseinsertion.php" method="post" class="form">
                <div class="form-group">
                    <h2>Enter Course Details</h2>
                    <label for="name">Course Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="semesters">No.of Semesters</label>
                    <input class="form-control" type="number" name="semesters" id="semesters">
                </div>
                <div class="form-group">
                    <label for="date">Launch Date</label>
                    <input class="form-control" type="date" name="date" id="date">
                </div>
                <div class="form-group">
                    <label for="prequality">Prequality</label>
                    <select name="prequality" id="prequality" class="form-control">
                        <option value="NULL">Not Required</option>
                        <?php
                        require '../connection.php';
                        $sql = "SELECT Courseid,Name FROM Course";
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
                <div class="form-group">
                    <label for="intrest">Interest</label>
                    <select name="intrest" id="intrest" class="form-control">
                        <option value="NULL">Not Required</option>
                        <?php
                        require '../connection.php';
                        $sql = "SELECT Intrestid,Name FROM Intrest";
                        $data = mysqli_query($dbcon, $sql);
                        if ($data) {
                            $r = mysqli_num_rows($data);
                            for ($i = 0; $i < $r; $i++) {
                                $row = mysqli_fetch_array($data);
                                echo "<option value=" . $row['Intrestid'] . ">" . $row['Name'] . "</option>";
                            }
                        }

                        ?>
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit">
            </form>
        </div>
    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>