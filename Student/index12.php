<?php
session_start();
if(!isset($_SESSION['UserName'])){
    echo "Working";
    header('location:./login.html');
}
?>
<html>
    <head>
        <title>Course Recommender</title>
        <link rel="stylesheet" href="Style1.css">
        <link rel="stylesheet" href="../tables.css">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <script src="changediv.js"></script>
    </head>
    <body>
        <header class="header">
            <h1 class="heading">Course Recommender</h1>
            <nav class="nav">
                <ul class="ulist">
                <li class="list"><a class="link" href="index1.php">Home</a></li>
                    <li class="list"><a class="link" href="courseview.php">Courses</a></li>
                    <li class="list"><a class="link" href="collegemanager.php">Colleges</a></li>
                    <li class="list"><a class="link" href="CCmanage.php">College Courses</a></li>
                    <li class="list"><a class="link" href="profile.php">Profile</a></li>
                    
                </ul>
            </nav>
    </header>
    <nav class="nav2">
        <form action="logout.php" method="post">
            <input type="submit" name=logout value="lout" class="logout">
        </form>
    </nav>
    <main class="mainbox" id="content">
        <?php
        //session_start();
        $name=$_SESSION['UserName'];
            echo "<h1>Welcome $name</h1><br><h2>Make this page more useful</h2>";
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