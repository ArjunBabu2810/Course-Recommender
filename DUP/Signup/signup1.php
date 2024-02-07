<html>
    <head>
        <title>signup</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body >
        <div class="heading"><h1>COURSE RECOMMENDER</h1></div>
        <div class="box">
            <div class="box2">
        <form action="signup.php" method="post" class="form">
            <h3 align="center" style="border: none;">Sign Up</h3>
            <input type="text" name="name" placeholder="NAME">
            <input type="text" name="Email" placeholder="EMAIL">
            <span style="border:none;">Select Course Studied
                <select name="course" id="course" style="border:none;">
                    <option value="null"> </option>
                <?php
                    require './connection.php' ;
                    $sql="select Course_id,Name from Course";
                    $data=mysqli_query($dbcon,$sql);
                    if($data){
                        echo "values";
                        $r=mysqli_num_rows($data);
                        for($i=0;$i<$r;$i++){
                            $row=mysqli_fetch_array($data);
                            echo "<option value=".$row['Course_id'].">".$row['Name']."</option>";
                        }
                    }
                    
                ?>
                </select>
            </span>
            <span style="border:none;" class="span">Your Intrest
             <select name="intrest" id="intrest" style="border:none;">
             <option value="null"> </option>
            <?php
                require './connection.php' ;
                $sql="select intrest_id,intrest from Intrest";
                $data=mysqli_query($dbcon,$sql);
                if($data){
                    echo "values";
                    $r=mysqli_num_rows($data);
                    for($i=0;$i<$r;$i++){
                        $row=mysqli_fetch_array($data);
                        echo "<option value=".$row['intrest_id'].">".$row['intrest']."</option>";
                    }
                }
                
            ?>
            </select></span>
            <!-- <input type="text" name="intrest" placeholder="intrest"> -->
            <span style="border:none;">Previous College
                <select name="college" id="college" style="border:none;">
                <option value="null"> </option>
                <?php
                    require './connection.php' ;
                    $sql="select College_id,Name from College";
                    $data=mysqli_query($dbcon,$sql);
                    if($data){
                        echo "values";
                        $r=mysqli_num_rows($data);
                        for($i=0;$i<$r;$i++){
                            $row=mysqli_fetch_array($data);
                            echo "<option value=".$row['College_id'].">".$row['Name']."</option>";
                        }
                    }
                    
                ?>
                </select>
            </span>
            <span style="border:none;">Previous Job If Any
                <select name="job" id="job" style="border:none;">
                <option value="null"> </option>
                <?php
                        require './connection.php' ;
                        $sql="select Job_id,Name from Job";
                        $data=mysqli_query($dbcon,$sql);
                        if($data){
                            echo "values";
                            $r=mysqli_num_rows($data);
                            for($i=0;$i<$r;$i++){
                                $row=mysqli_fetch_array($data);
                                echo "<option value=".$row['Job_id'].">".$row['Name']."</option>";
                            }
                        }
                        
                    ?>
                </select>
            </span>
            <span>Year of passing
            <input type="date" name="year" placeholder="year"></span>
            <input type="number" name="phone" id="phone">
            <input type="password" name="password" id="password" placeholder="password">
            <input type="password" name="password2" id="password2" placeholder="retype password" 
            onchange="checkpassword()">
            <input type="submit" name="signup" value="signup" id="signup" class="switch">
        </form>
    </div>
    </div>
    </body>

</html>
<script>
    function checkpassword(){
        let a=document.getElementById("password").value;
        let b=document.getElementById("password2").value;
        if(a!=b){
            alert("passwords are not same");
        }
    }
</script>