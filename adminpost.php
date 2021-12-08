<?php
$DBservername="localhost";
$user="root";
$pwd="";
session_start();
$conCheck=mysqli_connect($DBservername,$user,$pwd);
mysqli_select_db($conCheck,"Sociodev");
if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"]=="POST" ){
    $content=$_POST['content'];
    $headline=$_POST['headline'];
    if(empty($content)){
        echo "<script>alert('Content Cannot Be empty')</script>";
        
    }
    else{

        $userid=$_SESSION['userid'];
        $postcnt=0;
        $query1="select * from postcnt";
        $query2="";
        $res=mysqli_query($conCheck,$query1);
        $f1=0;
        
        while($rows=mysqli_fetch_array($res)){
            if($rows[0]==$userid){
                $postcnt=$rows[1];
                $postcnt=$postcnt+1;
                $f1=1;
                $query2="insert into posts value('$userid',$postcnt,'$content','$headline')";
                mysqli_query($conCheck,$query2);
                $query3="update postcnt set count=$postcnt where user_id='$userid'";
                mysqli_query($conCheck,$query3);
                break;
            }
        }
        if($f1==0){
                
                $postcnt=$postcnt+1;
                $query2="insert into posts value('$userid',$postcnt,'$content','$headline')";
                $query3="insert into postcnt value('$userid',$postcnt)";
                mysqli_query($conCheck,$query2);
                mysqli_query($conCheck,$query3);
            
            
            
        }
    }

    

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div >
    <ul>
        <li><a href="Recent.html">Recents</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="global.php">Explore</a></li>
        <li><a href="approve.php">Approve and Disapprove</a></li>
        <li style="float:right"><a href="index.php">Logout</a></li>
        <li style="float:right"><a class="active"href="profile.php">
            <?php
        
        $x=$_SESSION['userid'];
        echo $x;
        ?></a></li>

    </ul>
    <br><br><br><br>
        
        <form action="post.php" method="POST">
            <textarea name="headline" cols="150" rows="3"   placeholder="Headline" ></textarea>
            <textarea name="content" cols="150" rows="35" Placeholder ="Write and Help"></textarea>
            <br>
            <input style="background-color:Yellow" align="center" name="submit" type="submit" value="Publish" ></input>
        </form>






    </div>
</body>
</html>