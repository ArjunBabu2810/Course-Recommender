

<?php
    require './connection.php' ;
    $sql="select Courseid,Name from Course";
    echo $_GET['cid'];
    // $data=mysqli_query($dbcon,$sql);
    // if($data){
    //     echo "values";
    //     $r=mysqli_num_rows($data);
    //     for($i=0;$i<$r;$i++){
    //         $row=mysqli_fetch_array($data);
    //         echo "<option value=".$row['Courseid'].">".$row['Name']."</option>";
    //     }
    // }
    
?>
