<?php 

session_start();

if(!isset($_SESSION['srutiadmin']))
 {
   header('location:index.php');
 };

$admin   =$_SESSION['srutiadmin'];

include "config.php";
    //Redirect browser if the upload form WAS NOT submited.  
        if (isset($_POST['submit'])) {  
               $songname = $_POST['songname']; 
               $cat      = $_POST['cat']; 
               $subcat   = $_POST['subcat'];         
            //Set the upload directory path  
            $target_path =   "uploads/";  
              
            //Array to store validation errors  
            $error_msg = array();  
           
            // Validation error flag, if this becomes true we won't upload  
            $error_flag = false;   
            

            // We get the data from the upload form  
            $filename      = $_FILES['audio_file']['name'];  
            $temp_filename = $_FILES['audio_file']['tmp_name'];  
            $filesize      = $_FILES['audio_file']['size'];  
            $mimetype      = $_FILES['audio_file']['type'];  

            //Convert all applicable characters to HTML entities  
            $filename = htmlentities($filename);  
            $mimetype = htmlentities($mimetype);  



      $Ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION)); 
    
      
    
      $userpic = rand(1000,1000000);
        

             $shuffled = str_shuffle('1234567890');
             $filename = $shuffled.time().'.'.$Ext;
             // echo $name;
             // die;


            //Check for empty file  
            if($filename == ""){  
                $error_msg[] = 'No file selected!';  
                $error_flag = true;  
            }  
              
            //Check the mimetype of the file  
            if($mimetype != "audio/x-mp3" && $mimetype != "audio/mp3"){  
                $error_msg[] = 'The file you are trying to upload does not contain expected data.  
                Are you sure that the file is an MP3 one?';  
                $error_flag = true;  
            }  
             
            //Get the file extension, an honest file should have one  
            $ext = substr(strrchr($filename, '.'), 1);  
            if($ext != 'mp3') {  
                $error_msg[] = 'The file type or extention you are trying to upload is not allowed!    
                    You can only upload MP3 files to the server!';  
                $error_flag = true;  
              
            }  
             
            //Check that the file really is an MP3 file by reading the first few characters of the file  
            $open = fopen($_FILES['audio_file']['tmp_name'],'r');  
            $read = fread($open,3);  
            @fclose($open);  
            if($read != "ID3"){  
                $error_msg[] = "The file you are trying to upload does not seem to be an MP3 file.";  
                $error_flag = true;  
            }  
              
            //Now we check the filesize.    
            //The file size shouldn't include any other type of character than numbers  
            if (!is_numeric($filesize)) {  
                $error_msg[] = 'Bad filesize!';  
                $error_flag = true;  
            }   
              
            //If it is too big or too small then we reject it  
            //MP3 files should be at least 1MB and no more than 10 MB   
            // Check if the file is too large  
            if($filesize > 90485760){  
                $error_msg[] = 'The file you are trying to upload is too large!    
                Please upload a smaller MP3 file';  
                $error_flag = true;  
            }  
              
            // Check if the file is too small  
            if($filesize < 1048600){  
                $error_msg[] = 'The file you are trying to upload is too small!  
                It is too small to be a valid MP3 file.';  
                $error_flag = true;  
            }  

            //Function to sanitize values received from the form. Prevents SQL injection  
            function clean($str) {  
                $str = trim($str);  
                if(get_magic_quotes_gpc()) {  
                    $str = stripslashes($str);  
                }  
                return mysqli_real_escape_string($str);  
            }  
      
            //Sanitize the POST values  
            
            
                if (is_uploaded_file($temp_filename)){   
                  
                    //If the file was moved, change the filename  
                    if(move_uploaded_file($temp_filename, $target_path . $filename)) {  
                          
                        //Again check that the file exists in the target path  
                        // if(file_exists($target_path . $filename)) {  
                        //     //Generate an uniqid  
                        //     $uniqfilename = uniqid(rand(1,9999));  
                              
                        //     //Assign upload date to a variable  
                        //     $date = date("Y-m-d");  
                              
                        //     //Rename the file to an uniqid version  
                        //     rename($target_path . $filename, $target_path . $uniqfilename);  
                        //       }
                          }
                      }
                            //Create INSERT query  
                            $sql    = "INSERT INTO song(songname,cat_id,subcat_id,file) VALUES('$songname','$cat','$subcat',
                            '$filename')";
 $result = mysqli_query($conn,$sql);
 if ($result) {
    echo "<script type='text/javascript'>alert('Music uploaded successfully!')</script>";
    header("location:viewsongs.php");
}


else
{
    echo "<script type='text/javascript'>alert('Music uploading failed!')</script>";
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
            <a href="home.php" class="logo">

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
                                    <h3 class="box-title">UPLOAD SONGS</h3>   
                                </div><!-- /.box-header -->
                                <!-- form start -->
<h4><a href="viewsongs.php" style="color:#3c8dbc; font-weight:bold;"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View Songs</a></h4> 
                                <form role="form" enctype="multipart/form-data" action="" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Song name</label>
                                            <input type="text" class="form-control" name="songname" id="exampleInputEmail1" placeholder="Enter song name">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Category</label>
                                            <br>
 
<select name="cat" id="cat">
    <option selected disabled>Select Category</option> 
<?php 
$result     = mysqli_query($conn,"SELECT * from category WHERE block='1'");
while ($row = mysqli_fetch_array($result))
{
    echo "<option value=".$row['cat_id'].">".$row['catname']."</option>";
}
?>        
</select> 
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Select Sub Category</label>
                                            <br>
      <select name="subcat" id="subcat">        
</select> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Song upload</label>
                                            <input type="file" name="audio_file" id="exampleInputFile">
                                        </div>
                                 </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){

    $('#cat').on("change",function () {
        var id = $(this).find('option:selected').val();
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "id="+id,
            success: function (response) {
                console.log(response);
                $("#subcat").html(response);
            },
        });
    }); 

});

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

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>        

    </body>
</html>