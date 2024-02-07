<?php
    $dbcon=mysqli_connect('localhost','root','','mydb');
    if($dbcon){
        echo "connection success";
    }
    else{
        echo "connection not success";
    }
?>