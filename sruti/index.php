<?php
session_start();

require 'config.php';


if(isset($_POST['submit']))

 {
    
    $username  = $_POST['username'];
    $password  = md5($_POST['password']);
  


    $query="SELECT * from login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$query); 
    $list=mysqli_fetch_array($result);
    
    if(mysqli_num_rows($result)==1){
    
     
    $_SESSION['srutiadmin']=$list;
    header('location:dashboard.php');


    }
    else
    {
    echo "<script language='javascript'>alert('login failed,try again')</script>";
    }    


 };
  

?>
<!DOCTYPE html>
<html>
<head>
<title>SRUTI | Admin</title>
<link rel="icon" href="sruti.ico" type="image/icon">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Text+Me+One' rel='stylesheet' type='text/css'>
<!-- //web font -->
</head>
<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">

    <!--<img class="img-responsive" src="images/jt1.jpg" width="158" height="140">-->
        <h1>SRUTI SCHOOL OF LITURGICAL MUSIC</h1>
        <H1>ADMIN</H1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form method="post" action=""> 
                    <input class="text" type="text" name="username" id="Username" placeholder="Username" required="">
                    <input class="text" type="password" name="password" id="password" placeholder="Password" required="">
                    <div class="wthree-text"> 
                        <div class="clear"> </div>
                    </div>   
                    <input type="submit" name="submit" value="submit">
                </form>
                <p></p>
            </div>   
        </div>  
        <!-- copyright -->
        <div class="w3copyright-agile">
            <p></p>
        </div>
        <!-- //copyright -->
        <ul class="w3lsg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>  
    <!-- //main --> 
</body>
</html>