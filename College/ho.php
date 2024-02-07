<html>
    <head>
        <link rel="stylesheet" href="Style.css">
    </head>
    <main class="mainbox" id="content">
    <?php 
    session_start(); 
    $name=$_SESSION['UserName']; 
    $id=$_SESSION['Collegeid']; 
    echo "<h1>Welcome $name</h1><br><h2>Make this page more useful</h2>";
    ?>
    </main>
</html>
