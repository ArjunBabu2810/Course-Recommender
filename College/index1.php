<?php
session_start();
if(!isset($_SESSION['UserName'])){
    echo "Working";
    header('location:../College/login.html');
}
?>
<html>
    <head>
        <title>Course Recommender</title>
        <link rel="stylesheet" href="Style.css">
        <script src="changediv.js"></script>
    </head>
    <body>
        <header class="header">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav">
                <ul class="ulist">
                    <li class="list"><a class="link" href="#" >Home</a></li>
                    <li class="list"><a class="link" href="courseview.php" >Course</a></li>
                    <li class="list"><a class="link" href="college.php" >College</a></li>
                    <li class="list"><a class="link" href="CCmanage.php" >College Course</a></li>
                    <li class="list"><a class="link" href="report.php" >Interested</a></li>
                </ul>
            </nav>
    </header>
    <nav class="nav2">
        <form action="logout.php" method="post">
            <input type="submit" name=logout value="lout" class="logout">
        </form>
    </nav>
    <main class="mainbox" id="content" style="color:white;">
        <?php
        //session_start();
        $name=$_SESSION['UserName'];
            echo '<h1 >Welcome '.$name.'</h1><br><h2>Add Courses in your College</h2>
            <br><h2>Also add new courses to help students</h2>';
        ?>
    </main>
    <footer class="footer">
        <p>&copy;Course Recommender System. All rights are reserved</p>
    </footer>
    </body>
</html>

<script>
    var links = document.querySelectorAll('.link');

    links.forEach(function(link){
        link.addEventListener('click',function(){
            links.forEach(function(link){
                link.classList.remove('active-link');
            });
            link.classList.add('active-link');
        });
    });
</script>