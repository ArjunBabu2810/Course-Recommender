<?php
    $dbcon=mysqli_connect('localhost','root','','Course1');
    if(!$dbcon){
        echo '<script>alert("connection not success")</script>';
    }
    //echo "connection";
?>