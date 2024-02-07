
<?php
    require 'header1.html';
    require '../connection.php';
    session_start();
    $id = $_SESSION['Collegeid'];

    // Query to get the count of interested students for the whole college
    $sql = "SELECT COUNT(*) AS count FROM Intrested WHERE College_id = $id";
    $data = mysqli_query($dbcon, $sql);
    $r = mysqli_fetch_array($data);
    $totalInterestedStudents = $r['count'];

    // Query to get information about each course and the count of interested students for each course
    $sql2 = "SELECT C.Name, CC.CCid, COUNT(I.CC_id) AS count
             FROM CollegeCourse AS CC
             JOIN Course AS C ON CC.Courseid = C.Courseid
             LEFT JOIN Intrested AS I ON CC.CCid = I.CC_id
             WHERE CC.Collegeid = $id
             GROUP BY C.Name, CC.CCid";
    $data2 = mysqli_query($dbcon, $sql2);
?>

    <div class="container mt-5">
        <h3>Number of Students Marked your college as Interested: <?php echo $totalInterestedStudents; ?></h3>

        <table class="table table-bordered" id="coursetable">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>No of Interested Students</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($data2)): ?>
                    <tr>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['count']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button class="btn btn-primary" onclick="generatePDF()">Generate PDF</button>
    </div>

