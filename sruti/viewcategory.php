 <?php
session_start();

if(!isset($_SESSION['srutiadmin']))
 {
   header('location:index.php');
 };

$admin   =$_SESSION['srutiadmin'];
include "config.php";
  $counter =0;
  $result     = mysqli_query($conn,"SELECT * from category WHERE block='1'");
  
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
                            <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">View Category</h3>                                    
                                </div><!-- /.box-header -->
                                <h4><a href="addcategory.php" style="color:#3c8dbc; font-weight:bold;"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Add Category</a></h4>
                                <div class="box-body table-responsive">
   
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Change Status</th>
                                                <th>Edit category name</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>

  <?php 
  while($row1 = mysqli_fetch_assoc($result))
    
   {
?>
                                        <tbody>
                                            <tr>
<td><?php echo ++$counter;?></td>
<td><?php echo $row1['catname'];?></td>
<?php
if($row1['block']==1){
$enab = "Enabled";
}
else
  {
    $enab = "Disabled";
  }?>
<td><?php echo $enab;?></td>

<td><a class="btn btn-danger btn-sm" href="blockm.php?id=<?php echo $row1['cat_id']; ?>"><button type="button" class="btn btn-danger">Disable</button></a></td>
<td><a class="btn btn-danger btn-sm" href="editcat.php?id=<?php echo $row1['cat_id']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to edit?')">Edit</button></a></td>
<td><a class="btn btn-danger btn-sm" href="delcat.php?id=<?php echo $row1['cat_id']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button></a></td>


                                                
                                            </tr>
                                        </tbody>
                                       <?php };?>
                                   
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </form>
            </section>
  
                       <!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

 <script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>
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


    </body>
</html>