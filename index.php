
 <?php
 $DBservername="localhost";
 $user="root";
 $pwd="";
 $conCheck=mysqli_connect($DBservername,$user,$pwd);
 if($conCheck){
     mysqli_query($conCheck,"create database Sociodev");
     mysqli_select_db($conCheck,"Sociodev");
     $Query1="create table posts(user_id varchar(20),post_no int,content nvarchar(4000),headline nvarchar(50),primary key(user_id,post_no))";
     mysqli_query($conCheck,$Query1);
     $Query2="create table postcnt(user_id varchar(20),count int,primary key(user_id))";
     mysqli_query($conCheck,$Query2);
    $Query3="create table signup(user_id varchar(20),password varchar(20),age int,primary key(user_id))";
    mysqli_query($conCheck,$Query3);
    $Query4="create table unanswered(user_id varchar(20), ques varchar(255))";
    mysqli_query($conCheck,$Query4);
    $Query5="create table adminsignup(admin_id varchar(20),password varchar(20),age int,primary key(admin_id))";
    mysqli_query($conCheck,$Query5);
    $Query6="create table global_posts(user_id varchar(20),post_no int,content nvarchar(4000),headline nvarchar(50),primary key(user_id,post_no))";
    mysqli_query($conCheck,$Query6);
    $Query7="create table global_shown(user_id varchar(20),post_no int,content nvarchar(4000),headline nvarchar(50),primary key(user_id,post_no))";
    mysqli_query($conCheck,$Query7);
    
    
 }
 else{
     echo "error";
 }
 
 
 
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body background="landing-page.svg">
    <h1 align="center" style="color: white; font-size: 35px;">Welcome to Social Media for developers!</h1>
    <p > <h2 style="color: Black; font-size: 22px; padding-top: 25px !important; padding-left: 260px;"> >Get Your Doubts Cleared</h2></p>
    <p ><h2 style="color: Black; font-size: 22px; padding-top: 25px !important; padding-left: 260px;"> >Help Others in the Comunity</h2></p>
    <p ><h2 style="color: Black; font-size: 22px; padding-top: 25px !important; padding-left: 260px;" > >Explore and learn!</h2></p>
    <p style="color: white; font-size: 20px; padding-top: 125px !important; padding-left: 60px; padding-right: 60px;">Sociodev is a one stop solution for developers 
        to get help from other developers and help other developers. Help and learn from developers across the globe. Share your ideas with the world. </p>
    <center>
        <table>
            <tr>
                <td>

                    <form action="signup.php" >
                    <input  id="login" class="form-element" type="submit" name="submit" value="SIGN UP"
                 style=" font-weight: bolder; border: 2px solid rgb(80, 80, 10); width: 4cm; height: 30px; border-radius: 20px;" >
                    </form>
                </td>
                <td>
                    <form action="login.php">
            
                        <input  id="login" class="form-element" type="submit" name="submit" value="Login"
                     style=" font-weight: bolder; border: 2px solid rgb(80, 80, 10); width: 4cm; height: 30px; border-radius: 20px;" >
                    </form>
                    
                </td>
                <td>
                    <form action="adminlogin.php">
            
                        <input  id="admin-login" class="form-element" type="submit" name="submit" value="Admin-Login"
                     style=" font-weight: bolder; border: 2px solid rgb(80, 80, 10); width: 4cm; height: 30px; border-radius: 20px;" >
                    </form>
                    
                </td>
            </tr>

        </table>
    </center>
</body>
</html>