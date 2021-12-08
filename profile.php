<?php
$DBservername="localhost";
$user="root";
$pwd="";
session_start();
$conCheck=mysqli_connect($DBservername,$user,$pwd);
mysqli_select_db($conCheck,"Sociodev");
$userid=$_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        nav{
            color:'green';
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color:#F0FFFF;
            
            }

            li {
            float: left;
            }

            li a {
            display: block;
            color: 'green';
            text-align: center;
            font-size: 20px;
            padding: 14px 16px;
            text-decoration: none;
            }

            /* Change the link color to #111 (black) on hover */
            li a:hover {
            background-color: #111;
            }
            #btm {
                position: absolute;
                bottom: 0;
            }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <ul>
        <li><a href="frame1.html"><strong></strong>Developer</strong></a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="#About">About</a></li>
        <li style="float:right"><a class="active" href="ques.php">Ask</a></li>
      </ul>
        <br><br>
        <br>
    <table style="margin-left: 315;  " >
        <tr >
            <td rowspan="4"><img style="border-radius: 30%; padding: 200; margin-right: 28ch;" src="profile.jpg" width="250"></td>
        </tr>
        <tr>
            <td><h1>
            <?php
            echo $userid;
            ?>
            </h1></td>
        </tr>
    </table>
    <br><br>
    <h2 align="center">MY POSTS </h2>
    <table border=1 align=center style="width:1000px; border: 1px solid black" ></table>
    <br>
    <br>
    <br>
    <?php
echo "<table border=1 align=center style=\"width:1000px; border: 1px solid black\" >";
$query="select * from posts";
$res=mysqli_query($conCheck,$query);
while($rows=mysqli_fetch_array($res)){
    if($rows[0]==$userid){

        echo"
        <tr  >
        <td style=\"text-align:left\">
        <h2>$rows[1]) $rows[3]</h2>
        </td>
        </tr>
        <tr  >
             <td style=\"text-align:center\">
             $rows[2]
             </td>
         </tr>";
    }

}

        

echo"</table>";

        
            ?>
    </table>
</body>
</html>