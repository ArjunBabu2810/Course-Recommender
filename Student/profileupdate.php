<!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link rel="stylesheet" href="pupdate.css">
              <style>
                  
              </style>
              <title>Profile update</title>
          </head>
          <body>
            <header class="header">
                <h1>Course Recommender</h1>
            </header>
              <div class="container">
                  <h1 class="form-title">Update Profile</h1>
                  <form class="signup-form" action="pupdate.php" method="post">

                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-input" required>

                    <label for="year" class="form-label">Year Of Passing</label>
                    <input type="date" id="year" name="year" class="form-input" required>

                    <label for="course" class="form-label">Course</label>
                    <select name="course" id="course" class="option">
<?php
    require '../connection.php';
    echo '';
                          $sql="select Courseid,Name from Course WHERE `Status`=1";
                          $data=mysqli_query($dbcon,$sql);
                          if($data){
                              while($row=mysqli_fetch_array($data)){
                                  echo '<option value='.$row['Courseid'].' class="option">'.$row['Name'].'</option>';
                              }
                          }
                  echo '</select>

                      <label for="college" class="form-label">College</label>
                      <select name="college" id="college" class="option">';
                          $sql="select Collegeid,Name from College WHERE `Status`=1";
                          $data=mysqli_query($dbcon,$sql);
                          if($data){
                              while($row=mysqli_fetch_array($data)){
                                  echo '<option value='.$row['Collegeid'].' class="option">'.$row['Name'].'</option>';
                              }
                          }
                  echo '</select>

                      <label for="job" class="form-label">Job</label>
                      <select name="job" id="job" class="option">';
                          $sql="select Jobid,Name from Job WHERE `Status`=1";
                          $data=mysqli_query($dbcon,$sql);
                          if($data){
                              while($row=mysqli_fetch_array($data)){
                                  echo '<option value='.$row['Jobid'].' class="option">'.$row['Name'].'</option>';
                              }
                          }
                  echo '</select>

                      <label for="interest" class="form-label">Interest</label>
                      <select name="interest" id="interest" class="option">';
                          $sql="select Intrestid,Name from Intrest";
                          $data=mysqli_query($dbcon,$sql);
                          if($data){
                              while($row=mysqli_fetch_array($data)){
                                  echo '<option value='.$row['Intrestid'].' class="option">'.$row['Name'].'</option>';
                              }
                          }
                  echo '</select>

                      <input type="submit" class="form-button" value="Update" name="update">
                  </form>
              </div>
              <footer class="footer">
              <p>&copy;Course Recommender System. All rights are reserved</p>
                </footer>
          </body>
          </html>';
?>
