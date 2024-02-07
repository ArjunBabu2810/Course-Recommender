<?php
    require 'header1.html';
    require '../connection.php';
    session_start();
    $id = $_SESSION['Collegeid'];

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Assuming you receive two dates from the user, replace 'your_start_date' and 'your_end_date' with the actual dates
        $startDate = $_POST['start'];
        $endDate = $_POST['end'];

        // Query to get the count of interested students for the whole college within the date range
        $sql = "SELECT COUNT(*) AS count
                FROM Intrested
                WHERE College_id = $id AND Date BETWEEN '$startDate' AND '$endDate'";
        $data = mysqli_query($dbcon, $sql);
        $r = mysqli_fetch_array($data);
        $totalInterestedStudents = $r['count'];

        // Query to get information about each course and the count of interested students for each course within the date range
        $sql2 = "SELECT C.Name, CC.CCid, CONCAT(YEAR(I.Date), '-', WEEK(I.Date)) AS `year_week`, COUNT(I.CC_id) AS `count`
                 FROM CollegeCourse AS CC
                 JOIN Course AS C ON CC.Courseid = C.Courseid
                 LEFT JOIN Intrested AS I ON CC.CCid = I.CC_id
                 WHERE CC.Collegeid = $id AND I.Date BETWEEN '$startDate' AND '$endDate'
                 GROUP BY C.Name, CC.CCid, `year_week`";
        $data2 = mysqli_query($dbcon, $sql2);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Your Page Title</title>
</head>
<body>

    <div class="container mt-5">
        <form action="" method="post" class="form-inline">
            <div class="form-group mr-2">
                <label for="start">Start Date:</label>
                <input type="date" name="start" id="start" class="form-control">
            </div>
            <div class="form-group mr-2">
                <label for="end">End Date:</label>
                <input type="date" name="end" id="end" class="form-control">
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </form>

        <?php
            // Display the results if the form is submitted
            if (isset($_POST['submit'])):
        ?>
        <h3 class="mt-4">Number of Students Marked your college as Interested (<?php echo $startDate; ?> to <?php echo $endDate; ?>): <?php echo $totalInterestedStudents; ?></h3>

        <table class="table table-bordered mt-3" id="coursetable">
            <thead>
            <tr>
                    <th colspan="3"><center><?php echo $_SESSION['UserName']?>(Weekly) </center></th>
                    
                </tr>
                <tr>
                    <th>Course Name</th>
                    <th>Year-Week</th>
                    <th>No of Interested Students</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($data2)): ?>
                    <tr>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['year_week']; ?></td>
                        <td><?php echo $row['count']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button class="btn btn-primary" onclick="generatePDF()">Generate PDF</button>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
