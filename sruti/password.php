<?php 

include "config.php";
session_start();

if(!isset($_SESSION['srutiadmin']))
 {
   header('location:index.php');
 };

$admin   =$_SESSION['srutiadmin'];

 


 if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $newpassword = md5($_POST['newpassword']);

        $confirmnewpassword = md5($_POST['cnewpassword']);

        $result = mysqli_query($conn,"SELECT password FROM login WHERE username='$username'");
        $row = mysqli_fetch_assoc($result);

        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else if($newpassword == $confirmnewpassword)
        {

       

        $sql="UPDATE login SET password='$newpassword'";
       $res1 = mysqli_query($conn,$sql);
        if($res1)
        {
        echo "<script language='javascript'>alert('Password changed succesfully')</script>";
        }
       else
        {
      echo "<script language='javascript'>alert('Password not matching')</script>";
       }
      }
  }


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sruti school of liturgical music</title>
        <link rel="icon" href="sruti.ico" type="image/icon">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->

<link href="css/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="dashboard.php" class="logo">

                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                SRUTI
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <?php require 'sidebar.php' ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <!-- Content Header (Page header) -->
               

                <!-- Main content -->
                <section class="content">
   
                    <!-- Small boxes (Stat box) -->
                                <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">CHANGE PASSWORD</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                
                                <form role="form" enctype="multipart/form-data" action="" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter username</label>
                                            <input type="text" class="form-control" name="username" placeholder="Enter username">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter current password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter current password">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Create new password</label>
                                            <input type="password" class="form-control" name="newpassword" placeholder="Create new password">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Re-enter new password</label>
                                            <input type="password" class="form-control" name="cnewpassword" placeholder="Re-enter new password">
                                        </div>
    
  
 
                                 </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->




        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="js/bootstrap-toggle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
      
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>        
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
</script>  
    </body>
</html>