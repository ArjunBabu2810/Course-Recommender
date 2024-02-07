<?php
session_start();
// if (!isset($_SESSION['UserName'])) {
//     echo "Working";
//     header('location:../Login/login.html');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Recommender</title>
    <!-- Use Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../College/Style.css">
    <script src="changediv.js"></script>
</head>

<body>
    <header class="header bg-dark text-white">
        <div class="container">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav">
                <ul class="ulist nav justify-content-end">
                    <li class="list nav-item"><a class="link nav-link active-link" href="#">Home</a></li>
                    <li class="list nav-item"><a class="link nav-link" href="../Adminmanage.php">Admin</a></li>
                    <li class="list nav-item"><a class="link nav-link" href="../coursemanage.php">Course</a></li>
                    <li class="list nav-item"><a class="link nav-link" href="../collegemanager">College</a></li>
                    <li class="list nav-item"><a class="link nav-link" href="../CCmanage.php">College Course</a></li>
                    <li class="list nav-item"><a class="link nav-link" href="../intrestmanage.php">Interest</a></li>
                    <li class="list nav-item"><a class="link nav-link" href="../jobmanager.php">Job</a></li>
                    <li class="list nav-item"><a class="link nav-link" href="./ss.php">Students</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <nav class="nav2">
        <div class="container">
            <form action="logout.php" method="post">
                <input type="submit" name="logout" value="Logout" class="logout btn btn-danger">
            </form>
        </div>
    </nav>
    <main class="mainbox container mt-4">
        <?php
        $name = $_SESSION['UserName'];
        echo "<h1 class='display-4'>Welcome $name</h1><p class='lead'>Make this page more useful</p>";
        ?>
    </main>
    <footer class="footer bg-dark text-white">
        <div class="container">
            <p class="mb-0">&copy; Course Recommender System. All rights are reserved</p>
        </div>
    </footer>

    <!-- Use Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
