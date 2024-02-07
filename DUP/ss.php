<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Recommender</title>
    <!-- Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./College/Style.css">
    <link rel="stylesheet" href="tables.css">
    <script src="changediv.js"></script>
    <style>
        body {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        .header {
            background-color: #34495e;
            color: #ffffff;
            padding: 15px 0;
        }

        .navbar {
            background-color: #2c3e50;
            border-bottom: 1px solid #1f2c38;
        }

        .nav2 {
            background-color: #34495e;
            padding: 10px 0;
        }

        .mainbox {
            margin-top: 20px;
        }

        .student-details {
            margin-bottom: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .delete {
            width: 100%;
            margin-top: 10px;
        }

        .alert-container {
            position: fixed;
            top: 15px;
            right: 15px;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <header class="header text-center">
        <div class="container">
            <h1 class="heading">Course Recommender</h1>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./Adminmanage.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./coursemanage.php">Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./collegemanager.php">College</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./CCmanage.php">College Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./intrestmanage.php">Interest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./jobmanager.php">Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./studentmanage.php">Students</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="nav2">
        <div class="container">
            <form action="logout.php" method="post">
                <input type="submit" name="logout" value="Logout" class="logout btn btn-danger">
            </form>
        </div>
    </nav>
    <main class="mainbox container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            require '../connection.php';
            $sql = "SELECT * FROM Student";
            $data = mysqli_query($dbcon, $sql);

            if ($data) {
                while ($row = mysqli_fetch_array($data)) {
                    echo '<div class="col">';
                    echo '<div class="card student-details">';
                    echo '<div class="card-body">';
                    echo '<form action="std.php" method="post">';
                    // ... your existing PHP code ...

                    echo '<button type="submit" name="delete" class="delete btn btn-danger">Delete</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </main>

    <!-- Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery for Bootstrap tooltips (make sure it's included before Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <!-- Example of an alert for messages -->
    <div class="alert-container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Student deleted successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</body>

</html>
