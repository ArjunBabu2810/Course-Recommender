<?php
    require './connection.php';
    if(isset($_POST['login'])){
        $sql="SELECT email,Password FROM Student";
        $data=mysqli_query($dbcon,$sql);
        $rows=mysqli_num_rows($data);
        $email=$_POST['email'];
        $password=$_POST['password'];
        echo $rows;
        for($i=0;$i<$rows;$i++){
            $r=mysqli_fetch_array($data);
            if($email == $r['email']){
             if($password == $r['Password']){
                    Echo "Hello user";
             }
            }

        }
    }
?>