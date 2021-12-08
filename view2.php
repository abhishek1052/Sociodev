<?php
$DBservername="localhost";
$user="root";
$pwd="";
session_start();
$conCheck=mysqli_connect($DBservername,$user,$pwd);
mysqli_select_db($conCheck,"Sociodev");
$headline=$_SESSION['h1'];
$content=$_SESSION['h2'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 align="center"><?php
echo $headline;
?></h1>  

<div align="left">
    <?php
    echo $content;
    ?>
</div>
</body>
</html>