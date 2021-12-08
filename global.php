<?php
$DBservername="localhost";
$user="root";
$pwd="";
session_start();
$conCheck=mysqli_connect($DBservername,$user,$pwd);
mysqli_select_db($conCheck,"Sociodev");
$Query="select * from global_shown";
$res=mysqli_query($conCheck,$Query);
if(isset($_POST['read'])){
    session_start();
    $_SESSION['h1']=$_POST['headline'];
    $_SESSION['h2']=$_POST['content'];
    header('Location:view2.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="global.css">
</head>
<body>
<ul>
        <li><a href="Recent.html">Recents</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="NBlog.html">Explore</a></li>
        <li><a href="#about"></a></li>
        <li style="float:right"><a href="index.php">Logout</a></li>
        <li style="float:right"><a class="active"href="profile.php">
            <?php
        
        $x=$_SESSION['userid'];
        echo $x;
        ?></a></li>

    </ul>
    <br><br><br>
<div align="center">

    <?php
    while($rows=mysqli_fetch_array($res)){
        
        echo"<div class='post'>";
        echo"<h1>$rows[3]</h1>";
        echo"<p>"; 
        echo substr($rows[2],0,500);
        echo"</p>";
        
        echo"
    
    <form action='global.php' method='post'>
    
    <input id='readmore' type='submit' value='Read More ...' name='read'>
    <input type='hidden' name='headline' value='$rows[3]'>
    <input type='hidden' name='content' value='$rows[2]'>
    
    
    </form>
        ";
        echo"</div>";
    
    }
    
    ?>    
      
</div>


</body>
</html>