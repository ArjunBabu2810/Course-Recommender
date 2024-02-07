<html>
    <head>
        <title>Insertion</title>
    </head>
    <body>
        <form action="" method='post'>
            <table>
                <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name=Name></td>
                </tr>
                <tr>
                    <td><label for="Roll no">RollNo</label></td>
                    <td><input type="text" name=Rollno></td>
                </tr>
                <tr>
                    <td>
                        <label for="Marks">marks</label>

                    </td>
                    <td><input type="text" name=Marks></td>

                </tr>
                <tr><td><input type="submit" value="submit" name="submit"></td></tr>
            </table>
        </form>
    </body>
</html>
<?php
        $dbcon=mysqli_connect('localhost','root','','mydb');
        if($dbcon){
            echo "connection success";
            if(isset($_POST['submit'])){
                echo "hehehe";
                $name=$_POST['Name'];
                $rollno=$_POST['Rollno'];
                $marks=$_POST['Marks'];
                echo "$name $rollno $marks";
                $sql=insert into 
            }
        }
        else{
            echo "connection not success";
        }
?>