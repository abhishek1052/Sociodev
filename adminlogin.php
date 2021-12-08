<?php
$DBservername="localhost";
$user="root";
$pwd="";
$conCheck=mysqli_connect($DBservername,$user,$pwd);
mysqli_select_db($conCheck,"Sociodev");
if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"]=="POST"){
    $userid=$_POST["username"];
    $password=$_POST["password"];
    $validate="select * from adminsignup";
    $res=mysqli_query($conCheck,$validate);
    $f=0;
    while($rows=mysqli_fetch_array($res)){
        if($rows[0]==$userid && $rows[1]==$password ){
            $f=1;
        session_start();
        $_SESSION['userid']=$userid;
        $_SESSION['password']=$password;
        header('Location:adminpost.php');
        }
    }
    if($f==0){
        echo "<script>
        alert('Invalid Username or password');
    </script>";
    }

}
?>
<!DOCTYPE html>
<html >
<head>
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
    
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li style="float:right"><a class="active" href="#about">About</a></li>
    </ul>
    <br>
      <br><br>
        <div  id="login-container"  align ="center" id style="padding: 30px; margin: auto; " method="post">
            <form name="form2" id="form-container" action="" method="post" height: 8cm; width: 8cm; onsubmit="validation()">
                <br>
                <h1>Sign in (Admin)</h1>
                <table>
                    <tr>
                        <tr><td>
                        <a href="#"><img src="google.png"  alt="" style="border-radius: 50%;height: 45px;"></a>
                        <a href="#"><img src="facebook.png"  alt="" style="border-radius: 50%;height: 45px;width: 50px;"></a>
                        <a href="#"><img src="Linkedin.png"  alt="" style="border-radius: 50%;height: 45px;width: 50px;"></a>    
                    </td>
                </tr>
                        <tr></tr>
                    </tr>
                </table>
                    <div><h3 style="font-style: italic;">OR USE...</h3></div>
                <table class="form-table">
                    <tr>
                        <td ><input class="form-element" type="text" name="username" placeholder="Enter Username" style="width: 6cm; height: 0.9cm;" required>
                        </td>
                    </tr>
                    <tr>
                        <td ><input class="form-element" type="password" name="password" placeholder="Enter password" style="width: 6cm; height: 0.9cm;" required >
                        </td>
                    </tr>
                </table>
                <br>
                <input  id="login" class="form-element" type="submit" name="submit" value="SIGN IN" style=" font-weight: bolder; border: 2px solid rgb(80, 80, 10); width: 4cm; height: 30px; border-radius: 20px;" >
                <br><br><br>
               
                <a  href="signup.html" style="text-decoration: none;color: aliceblue;font-size: medium;font-weight: bolder;color: black;">Dont have an Account ?</a>
            </form>
        </div>  
        <div id="result">

        </div>
</body>
<br><br>
    <br><br><br>
    
</html>