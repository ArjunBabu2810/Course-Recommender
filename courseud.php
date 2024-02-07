<?php
session_start();
if(!isset($_SESSION['UserName'])){
    echo "Working";
    header('location:../Login/login.html');
}
?>
<?php
   require './connection.php';
   echo "hai";
   if(isset($_POST['approveall'])) {
        $sql="UPDATE `Course` SET `Status` = 1";
        echo $sql;
        $data=mysqli_query($dbcon,$sql);
        if($data){
        echo '<script>alert("Course updated")</script>';
        header('location:./coursemanage.php'); 

        }
        else{
        echo '<script>alert("Not updated")</script>';
        header('location:./coursemanage.php'); 

        }
   }
   if(isset($_POST['update'])) {
    //$courseid=mt_rand(100000,999999);
        $courseid=$_POST['Courseid'];
        $name=$_POST['Name'];
        $semesters=$_POST['Semester'];
        $date=$_POST['date'];
        $prequality=$_POST['prequality'];
        $intrest=$_POST['intrest'];
        if(isset($_POST['Rating'])){
        $sql1="SELECT * FROM Course WHERE Courseid=$courseid;";
        $data1=mysqli_query($dbcon,$sql1);
        $row5=mysqli_fetch_array($data1);
        $rating=($_POST['Rating']+$row5['Rating'])/2;
        echo $rating;
        }
        else 
        $rating=0;
        if(isset($_POST['Status']))
        $status=$_POST['Status'];
        else
        $status=0;
        $sql="UPDATE `Course` SET `Name` = '$name', `Prequality` = $prequality,`Date` = '$date',
                `Rating` = '$rating', `Status` = '$status',`Intrestid` = $intrest WHERE `Course`.`Courseid` = $courseid";
                echo $sql;
        $data=mysqli_query($dbcon,$sql);
        if($data){
            echo '<script>alert("Course updated")</script>';
            header('location:./coursemanage.php'); 

        }
        else{
            echo '<script>alert("Not updated")</script>';
            header('location:./coursemanage.php'); 

        }   
    }
    elseif (isset($_POST['delete'])) {

        $courseid=$_POST['Courseid'];
        $checkQuery = "SELECT COUNT(*) AS count FROM CollegeCourse WHERE CCid = $courseid";
        $Result = mysqli_query($dbcon, $checkQuery);
        $counts = mysqli_fetch_assoc($Result);
        if ($counts["count"] == 0) {
            mysqli_query($dbcon, "DELETE FROM Intrested WHERE Course_id = $courseid");
            $sql="DELETE FROM course WHERE `course`.`Courseid` = $courseid";
            $data=mysqli_query($dbcon,$sql);
            if($data){
                echo '<script>alert("Course deleted")</script>';
                header('location:./coursemanage.php'); 

            }
            else{
                echo '<script>alert("not deleted")</script>';
                header('location:./coursemanage.php'); 

            }
        }
        else{
            echo "<script> alert ('This course is linked to a college and cannot be deleted')";
            echo "</script>";
            header('location:./coursemanage.php');
        }    
    }
?>