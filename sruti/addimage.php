<?php 
session_start();

if(!isset($_SESSION['srutiadmin']))
 {
   header('location:index.php');
 };

$admin   =$_SESSION['srutiadmin'];
include "config.php";
 
        if (isset($_POST['submit'])) {  
    
   
    function checkFile($file){
    // check file type
    $allowed =  array('gif','png' ,'jpg', 'jpeg', 'GIF','PNG' ,'JPG', 'JPEG');
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    if(!in_array($ext, $allowed) ) {
        die("Unsupported file format, allowed(gif,png,jpg,jpeg).");
    }
    elseif ($file['size'] > 1000000) {
        die("file size too large.");
    }
    else{
    // file upload
    $shuffled = str_shuffle('1234567890');
    $file_name = $shuffled.time().'.'.$ext;
    move_uploaded_file($file['tmp_name'], 'uploads/' . $file_name);
    return $file_name;
  };
}


$file1 = $_FILES['file-1'];
$file2 = $_FILES['file-2'];
$file3 = $_FILES['file-3'];


    if ($file1['size'] > 0) {
      $file1_name = checkFile($file1);
      $sql1 = mysqli_query($conn, "INSERT INTO aboutimages(image) VALUES('$file1_name')") or die(mysqli_error($conn));
      $result1 = mysqli_query($conn,$sql1);
    };
    if ($file2['size'] > 0) {
      $file2_name = checkFile($file2);
      $sql2 = mysqli_query($conn, "INSERT INTO aboutimages(image) VALUES('$file2_name')");
      $result2 = mysqli_query($conn,$sql2);
    };
    if ($file3['size'] > 0) {
      $file3_name = checkFile($file3);
      $sql3 = mysqli_query($conn, "INSERT INTO aboutimages(image) VALUES('$file3_name')");
      $result3 = mysqli_query($conn,$sql3);
    };
header("location:viewaboutimages.php");
                  };  


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sruti school of liturgical music</title>
        <link rel="icon" href="sruti.ico" type="image/icon">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
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
                                    <h3 class="box-title">ADD ABOUT IMAGES</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" enctype="multipart/form-data" action="" method="POST">
                                    <div class="box-body">
                                      
                                        
                                         <div class="form-group">   
                                       <label>Upload Images
                                        <span style="color:red"> (300x 200)</span></label>
                                       <input type="file" accept="image/*" id="imgInp" name="file-1" id="file-1" />

                                       <input type="file" accept="image/*" id="imgInp1" name="file-2" id="file-2" />

                                       <input type="file" accept="image/*" id="imgInp2" name="file-3" id="file-3" />

                                       Option to add a maximum of 3 images
                                       </div>
                                 </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">upload</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
<div class="col-md-4">
<img id="blah" class="img-responsive" height="300" width="250">
</div>
<div class="col-md-4">
<img id="blah1" class="img-responsive" height="300" width="250">
</div>
<div class="col-md-4">
<img id="blah2" class="img-responsive" height="300" width="250">
</div>
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
<script>
  function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah1').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp1").change(function(){
    readURL(this);
});
</script>
<script>
  function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah2').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp2").change(function(){
    readURL(this);
});
</script>
    </body>
</html>