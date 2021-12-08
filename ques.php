<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url('Background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            
        }

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

        p:first{
            font-weight: bold;
        }

        li a {
            display: block;
            color: 'green';
            text-align: center;
            font-size: 25px;
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
        #f1 {
            font-size: 25px;
        }
    </style>
    <script>
        function validateform1(){
            var query=document.forms["form1"]["query"].value;
            if(query==""){
                alert("Field cannot be empty");
                return false;
            }else{
                var c=query.length;
                alert("Number of Characters in string = "+c);
            }
            return false;
        }

        function func1(){        
            document.getElementById("ques1").style["boxShadow"] = "0 0 5px red";
            return ;
        }

        function mouseOver(){
            document.getElementById('ques1').style.font="size='25' face='Arial color='#FF0000'";
        }

    </script>

    <link rel="stylesheet" href="style.css">
</head>
<body >
    <ul>
        <li><a href="home.html"><strong></strong>Developer</strong></a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="#About">About</a></li>
        <li style="float:right"><a class="active" href="ques.html">Ask</a></li>
      </ul>
      <br>
      <br>
      <?php 
        $DBservername='localhost';
        $User="root";
        $pwd="";
        $conCheck=mysqli_connect($DBservername,$User,$pwd);
        mysqli_select_db($conCheck,"Sociodev");
    if(isset($_POST['update'])){
        $v1=$_POST['ques'];
        
        session_start();
        // $_SESSION['userid']='abc@gmail.com';
        $p1=$_SESSION['userid'];
        $qu=$_POST['ques'];
        $tupple="Insert into unanswered values('$p1','$qu')";
        if(mysqli_query($conCheck,$tupple)){
            echo "<h1>Inserted Succesfully</h1>";
        }

    }else{
?>
        <form align="center" name="form1" action="<?php $_PHP_SELF ?>"  method="post">
        
        <h1 style="color: green;">Enter the Question</h1>

        <textarea id="ques1" name="ques" onmouseover="return mouseOver();" onclick="return func1()"  id="query" name="query" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" name="update" value="update">

    </form>
<?php } ?>
    
    <div >
        <img src="download.png">
        <h2>Already answered questions.</h2>

        <dl style="background-color: cornsilk;">
        <?php
            $fetch='select * from answered';
            $info=mysqli_query($conCheck,$fetch);
            while($row=mysqli_fetch_array($info)){
                echo "<dt id='f1'><b>$row[1] : $row[2]</br></dt><dd id='f1'>$row[3]</dd><br>";
            }
        ?>
             
        </dl>
        
</div>
</div>
</body>
</html>