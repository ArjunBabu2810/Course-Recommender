<?php
$dbcon = mysqli_connect("localhost","root","","mydb");
if(isset($_POST['Submit'])){
$rollno = $_POST['rollno'];

$stname = $_POST['stname'];

$stmark = $_POST['stmark'];

$sql ="INSERT INTO mystud (studid, stname, Marks) VALUES ('$rollno', '$stname', '$stmark')";
$data=mysqli_query($dbcon,$sql);
if($data){
echo '<script>alert("One Record is added")</script>';
}
else{
echo '<script>alert( "try again")</script>';
}
}
?>
<html>
<head>
<title>Insert Data</title>
</head>
<body>
<form action="" method="post">
<label>Rollno : </label><input type="text" name="rollno" ><br/><br/>
<label>StudentName : </label><input type="text" name="stname" ><br/><br/>
<label>Student Mark : </label><input type="text" name="stmark" ><br/><br/>
<input type="submit" name="Submit" value = "Insert">
</body>
</html>
