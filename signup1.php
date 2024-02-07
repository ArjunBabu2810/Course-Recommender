<html>
    <head>
        <title>signup</title>
        <link rel="stylesheet" href="common.css">
        <link rel="stylesheet" href="content.css">
    </head>
    <body >
    <header class="header">
            <h1>Course Recommender</h1>
        </header>
        <div class="box">
            
        <form action="signup.php" method="post" class="form">
        <div class="box2">
            <h3 align="center" class="heading">Sign Up</h3>
            <span class="items">NAME<input class="item" type="text" name="name" placeholder="NAME"></span>
            <span class="items">EMAIL<input class="item" type="text" name="Email" placeholder="EMAIL"></span>
            <span style="border:none;"class="items">Select Course Studied
                <select name="course" id="course" style="border:none;" class="option">
                    <option value="NULL"> Not Required </option>
                <?php
                    require './connection.php' ;
                    $sql="select Courseid,Name from Course";
                    $data=mysqli_query($dbcon,$sql);
                    if($data){
                        echo "values";
                        $r=mysqli_num_rows($data);
                        for($i=0;$i<$r;$i++){
                            $row=mysqli_fetch_array($data);
                            echo "<option value=".$row['Courseid'].">".$row['Name']."</option>";
                        }
                    }
                    
                ?>
                </select>
            </span>
            <span style="border:none;" class="items">Your Intrest
             <select name="intrest" id="intrest" style="border:none;" class="option">
             <option value="NULL">Not Required </option>
            <?php
                require './connection.php' ;
                $sql="select Intrestid,Name from Intrest";
                $data=mysqli_query($dbcon,$sql);
                if($data){
                    echo "values";
                    $r=mysqli_num_rows($data);
                    for($i=0;$i<$r;$i++){
                        $row=mysqli_fetch_array($data);
                        echo "<option value=".$row['Intrestid'].">".$row['Name']."</option>";
                    }
                }
                
            ?>
            </select></span>
            <!-- <input class="item" type="text" name="intrest" placeholder="intrest"> -->
            <span style="border:none;" class="items">Previous College
                <select name="college" id="college" style="border:none;" class="option">
                <option value="NULL"> Not Required</option>
                <?php
                    require './connection.php' ;
                    $sql="select Collegeid,Name from College";
                    $data=mysqli_query($dbcon,$sql);
                    if($data){
                        echo "values";
                        $r=mysqli_num_rows($data);
                        for($i=0;$i<$r;$i++){
                            $row=mysqli_fetch_array($data);
                            echo "<option value=".$row['Collegeid'].">".$row['Name']."</option>";
                        }
                    }
                    
                ?>
                </select>
            </span>
            <span style="border:none;" class="items">Previous Job If Any
                <select name="job" id="job" style="border:none;" class="option">
                <option value="NULL">Not Required </option>
                <?php
                        require './connection.php' ;
                        $sql="select Jobid,Name from Job";
                        $data=mysqli_query($dbcon,$sql);
                        if($data){
                            echo "values";
                            $r=mysqli_num_rows($data);
                            for($i=0;$i<$r;$i++){
                                $row=mysqli_fetch_array($data);
                                echo "<option value=".$row['Jobid'].">".$row['Name']."</option>";
                            }
                        }
                        
                    ?>
                </select>
            </span>
            <span class="items">Year of passing
            <input class="item" type="date" name="year" placeholder="year"></span>
            <span class="items">Phone
            <input class="item" type="number" name="phone" id="phone"></span>
            <span class="items">Password<input class="item" type="password" name="password" id="password" placeholder="password"></span>
            <span class="items">Confirm Password<input class="item" type="password" name="password2" id="password2" placeholder="retype password" 
            onchange="checkpassword()"></span>
            <input class="sbutton" type="submit" name="signup" value="signup" id="signup" class="switch">
            </div>
        </form>
    
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