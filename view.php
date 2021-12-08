<?php
$DBservername="localhost";
$user="root";
$pwd="";
$conCheck=mysqli_connect($DBservername,$user,$pwd);
mysqli_select_db($conCheck,"Sociodev");
session_start();
$userv=$_SESSION['usertoview'];
$post_n=$_SESSION['postn'];
$Query="select * from global_posts where user_id='$userv' and post_no=$post_n ";
$res=mysqli_query($conCheck,$Query);
$res1=mysqli_query($conCheck,$Query);
if(isset($_POST['appr'])){
    while($x=mysqli_fetch_array($res1)){

        $Query_g="insert into global_shown values('$userv','$post_n','$x[2]','$x[3]')";
        $res=mysqli_query($conCheck,$Query_g);
        $q1="delete from global_posts where user_id='$userv' and post_no='$post_n'";
        mysqli_query($conCheck,$q1);
        header('Location:approve.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    div::first-letter {
  font-size: 200%;
  color: #8A2BE2;
}
    </style>
</head>
<body>
    <?php
    while($rows=mysqli_fetch_array($res)){
        echo"<h1 align='center'>

        $rows[3];
        
        </h1> <br>
    <div align='left' style='font-size: 20px;'   >$rows[2]</div>
        
        ";
    }
    ?>
    <br><br><br>
    <form action="view.php" align='center' method="post">
        <input style="background-color: yellow;" type="submit" value="approve" name="appr">
    </form>

</body>
</html>
