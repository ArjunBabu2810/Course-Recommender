
    <?php
        require './header1.html'
    ?>

    <div class="container mt-5">
        <form action="" method="post">

            <!-- Year Input -->
            <div class="form-group" style="margin:3px;">
                <label for="year">Select a Year:</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>

            <!-- Month Input -->
            <div class="form-group" style="margin:3px;">
                <label for="month">Select a Month:</label>
                <input type="number" class="form-control" id="month" name="month" required>
            </div>
            <div class="form-group" style="margin:3px;">
                <label for="selection">Select an Option:</label>
                <select class="form-control" id="selection" name="selection" required>
                    <option value="course">Course</option>
                    <option value="college">College</option>
                    <option value="college-course">College Course</option>
                    <option value="job">Job</option>
                </select>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" style="margin:3px;" name=submit>Submit</button>

        </form>
    </div>



<?php
    require '../connection.php';
    if(isset($_POST['submit'])){
        $year=$_POST['year'];
        $month=$_POST['month'];
        if($_POST['selection']=="course"){
            $sql = "SELECT Name,Date FROM Course WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$month'";

            // echo $sql;
            $data = mysqli_query($dbcon,$sql);
            
            if ($data){
                echo '<div class="container mt-5">
                <h2 class="text-center">Course in '. $month . '-' . $year.'</h2>
                <table class="table table-striped" id="coursetable">
                    <thead>
                    <tr>
                        <th colspan=2 class="text-center">Courses added in '. $month . '-' . $year.'</th>
                    </tr>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                        while ($row = $data->fetch_assoc()) {
                            echo '<tr>
                            <td class="text-center">' . $row['Name'] . '</td>
                            <td class="text-center">' . $row['Date'] . '</td>
                            </tr>';

                        }
                echo '  </tbody>
                </table>
            </div>';
            }
        }
        if($_POST['selection']=="college"){
            $sql = "SELECT Name,Date FROM College WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$month'";

            // echo $sql;
            $data = mysqli_query($dbcon,$sql);
            
            if ($data){
                echo '<div class="container mt-5">
                <h2 class="text-center">College in '. $month . '-' . $year.'</h2>
                <table class="table table-striped" id="coursetable">
                    <thead>
                    <tr>
                        <th colspan=2 class="text-center">Colleges registered in '. $month . '-' . $year.'</th>
                    </tr>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                        while ($row = $data->fetch_assoc()) {
                            echo '<tr>
                            <td class="text-center">' . $row['Name'] . '</td>
                            <td class="text-center">' . $row['Date'] . '</td>
                            </tr>';

                        }
                echo '  </tbody>
                </table>
            </div>';
            }
        }
        if($_POST['selection']=="job"){
            $sql = "SELECT Name,Date FROM Job WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$month'";

            // echo $sql;
            $data = mysqli_query($dbcon,$sql);
            
            if ($data){
                echo '<div class="container mt-5">
                <h2 class="text-center">Job in '. $month . '-' . $year.'</h2>
                <table class="table table-striped" id="coursetable">
                    <thead>
                    <tr>
                        <th colspan=2 class="text-center">Jobs added in '. $month . '-' . $year.'</th>
                    </tr>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                        while ($row = $data->fetch_assoc()) {
                            echo '<tr>
                            <td class="text-center">' . $row['Name'] . '</td>
                            <td class="text-center">' . $row['Date'] . '</td>
                            </tr>';

                        }
                echo '  </tbody>
                </table>
            </div>';
            }
        }
        if($_POST['selection']=="college-course"){
            // $sql = "SELECT Name,Date FROM Job WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$month'";
            $sql= "SELECT
                CollegeCourse.Collegeid,
                CollegeCourse.Courseid,
                CollegeCourse.Date,
                College.Name AS CollegeName,
                Course.Name AS CourseName
                FROM
                    CollegeCourse
                JOIN
                    College ON CollegeCourse.Collegeid = College.Collegeid
                JOIN
                    Course ON CollegeCourse.Courseid = Course.Courseid
                WHERE
                    MONTH(CollegeCourse.Date) = $month
                    AND YEAR(CollegeCourse.Date) = $year;
                    ";
            // echo $sql;
            $data = mysqli_query($dbcon,$sql);
            $r=mysqli_num_rows($data);
            if ($data){
                echo '<div class="container mt-5">
                <h2 class="text-center">Collge Course in '. $month . '-' . $year.'</h2>
                <table class="table table-striped" id="coursetable">
                    <thead>
                    <tr>
                        <th colspan=3 class="text-center">'.$r.' CollegeCourses added in '. $month . '-' . $year.'</th>
                    </tr>
                        <tr>
                            <th class="text-center">College Name</th>
                            <th class="text-center">Course Name</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                        while ($row = $data->fetch_assoc()) {
                            echo '<tr>
                            <td class="text-center">' . $row['CollegeName'] . '</td>
                            <td class="text-center">' . $row['CourseName'] . '</td>
                            <td class="text-center">' . $row['Date'] . '</td>
                            </tr>';

                        }
                echo '  </tbody>
                </table>
            </div>';
            }
        }
        if($_POST['selection']=="student"){
            $sql = "SELECT Name,Date FROM Student WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$month'";

            // echo $sql;
            $data = mysqli_query($dbcon,$sql);
            
            if ($data){
                echo '<div class="container mt-5">
                <h2 class="text-center">Students Registered in '. $month . '-' . $year.'</h2>
                <table class="table table-striped" id="coursetable">
                    <thead>
                    <tr>
                        <th colspan=2 class="text-center">Students Registered in '. $month . '-' . $year.'</th>
                    </tr>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>';
                        while ($row = $data->fetch_assoc()) {
                            echo '<tr>
                            <td class="text-center">' . $row['Name'] . '</td>
                            <td class="text-center">' . $row['Date'] . '</td>
                            </tr>';

                        }
                echo '  </tbody>
                </table>
            </div>';
            }
        }
        
    }

?>
    <!-- Add Bootstrap JS and Popper.js scripts (optional) -->
    
 <!-- <button class="btn btn-primary" onclick="generatePDF()">Generate PDF</button> -->
 <button class="btn btn-primary" onclick="generatePDF()">Generate PDF</button>
<!-- 
</body>
</html> -->
<?php
        require '../footer.html'
    ?>



