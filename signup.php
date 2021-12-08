<!-- Bang Abhishek Deepak 19BCE2677 -->
<?php
$DBservername="localhost";
$user="root";
$pwd="";
$conCheck=mysqli_connect($DBservername,$user,$pwd);
$s1="";
$s2="";
mysqli_select_db($conCheck,"Sociodev");

if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"]=="POST"){
    
    $userid=$_POST["username"];
    $password=$_POST["password"];
    $age=$_POST["age"];
    if(empty($userid)){
        $s1="userid cannot be empty";
    }
    if(empty($password)){
        $s2="password cannot be empty";
    }
    if(!empty($userid) && preg_match("/^[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*@[a-zA-Z]+(\.[a-zA-Z]+)*(\.[a-zA-Z]{2,3})$/",$userid)){
        $insert_Query="insert into signup values('$userid','$password',$age)";      
        mysqli_query($conCheck,$insert_Query);
        session_start();
        $_SESSION['userid']=$userid;
        $_SESSION['password']=$password;
        header('Location:login.php');
    }
    else{
        echo "<script>
        alert('The username has to be of the type abc@gmail.com');
    </script>";
    }

}

?>

<!DOCTYPE html>
<html >
    <!-- Contributor : BANG ABHISHEK DEEPAK (19BCE2677) -->
    <head>
        <title>Document</title>
        <link rel="stylesheet" href="signup.css">
    <style>
        .form-table {
    border-collapse: separate;
  border-spacing: 0 10px;
            }
            ul {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    /* background-color: #333; */
    background: #111;
  }
  
li {
    float: left;
  }
  
li a {
    display: block;
    color: rgb(255, 255, 255);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

li a:hover {
    background-color: rgb(241, 235, 235);
    color: #111;
  }
  span{
      color="red"
  }
    </style>


<script>
    
    function func1(){        
            document.getElementById("username").style["boxShadow"] = "0 0 5px red";
            return ;
    }
    function func2(){
        document.getElementById("username").style["boxShadow"]="0 0 0";
        return ;
    }
    function func3(){
        document.getElementById("password").style["boxShadow"] = "0 0 5px red";
        return ;
    }
    function func4(){
        document.getElementById("password").style["boxShadow"]="0 0 0";
        return ;
    }
</script>

    </head>
    <body>    
<br>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="#news">News</a></li>
    <li><a href="#contact">Contact</a></li>
    <li style="float:right"><a class="active" href="#about">About</a></li>
  </ul>
  <br><br>
    <div align ="center" >
        <form id="form-container"  name="form1"  method="post" action="signup.php">
            <br>
            <h1>Sign Up</h1>
            <table>
                <tr>
                    <td>Username : </td>
                    <td ><input id="username" type="" name="username" placeholder="Enter Username"  onmouseout="return func2()">
                    <span style="color : red" >*  <?php
                    
                    echo $s1;
                    ?></span>    
                </td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input id="password" type="password" name="password" placeholder="Enter password"  onmouseout="return func4()">
                    <span style="color : red" >* <?php
                    echo $s2;
                    
                    ?></span>    
                </td>
                </tr>
                <tr>
                    <td>Confirm Password : </td>
                    <td><input type="password" name="confirm-password" placeholder="Re-enter password" onmouseover="return func1()">
                    </td>
                </tr>
                <tr>
                    <td>Age :</td>
                    <td><input type="number" name="age" placeholder="Enter Age" required ></td>
                </tr>
                <tr>
                    <td>Profession :</td>
                    <td >
                        <input type="radio" value="Student" name="profession">Student
                        <input type="radio" value="Teacher" name="profession">Teacher
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Gender :
                    </td>
                    <td>
                       <select name="Gender" required>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                           <option value="Other">Other</option>
                       </select>
                    </td>
                </tr>
                <tr>
                    <td>D.O.B</td>
                    <td><input type="date"></td>
                </tr>
                
                    
                    
            </table>
            <br>
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
            <input id="signup" type="submit" name="submit" value="Signup" >
        </form>
    </div>

</body>
    
    <br>
    <br>
    <br>
    <div align="center">
       contributor Bang Abhishek Deepak(19BCE2677)
    </div>
    
            </html>
            