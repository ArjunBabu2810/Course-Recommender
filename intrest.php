<?php
    require './connection.php';;
    if(isset($_POST['insert'])){
        $intid=$_POST['intrest_id'];
        $int=$_POST['intrest'];
        $sql="INSERT INTO `Intrest` (`Intrestid`, `Name`) VALUES (NULL, '$int')";
        if(mysqli_query($dbcon,$sql)){
            echo '<script>alert("value inserted")</script>';
        }
        else{
            echo '<script>alert("try again")</script>';
        } 
        //echo '<script type="text/javascript">window.top.location="./intrest.html"</script>';
       header('location:./intrest.html');
    }
?>