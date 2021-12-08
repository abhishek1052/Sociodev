<?php
$DBservername="localhost";
$user="root";
$pwd="";
$conCheck=mysqli_connect($DBservername,$user,$pwd);
mysqli_select_db($conCheck,"Sociodev");
session_start();
$Query1="select * from global_posts";
$res=mysqli_query($conCheck,$Query1);
if(isset($_POST['view'])){
    $_SESSION['usertoview']=$_POST['pk_user'];
    $_SESSION['postn']=$_POST['pk_post_n'];
    // $_SESSION['content']=$_POST['pk_content'];
    // $_SESSION['headline']=$_POST['pk_headline'];

    header('Location:view.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
background-image: url('Background.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;

}
</style>
<body>

<?php
echo"<table align= 'center' border=1 style='font-size: 30px;' >";
echo"<td>
<b>USERNAME<b> 
</td>
<td>
<b>POST NO<b> 
</td>";
while($rows=mysqli_fetch_array($res)){
    echo"<tr>
            <td>
            $rows[0]
            </td>
            <td>
            $rows[1]
            </td>
            <td>
                <form action='approve.php' method='post'>
                    <input type='submit' name='view' value='view' style='background-color: yellow;'  >
                    <input type='hidden' name='pk_user' value=$rows[0]>
                    <input type='hidden' name='pk_post_n' value=$rows[1]>
                    
                </form>
            </td>
        </tr>
";
    
}

echo "</table>";

?>







</body>
</html>