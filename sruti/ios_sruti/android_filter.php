

<?php 

include 'android_connection.php';

$song_name = $_POST['song_name'];



$sql= mysqli_query($conn,"SELECT * FROM  song WHERE songname='$song_name'");
 
$row=mysqli_fetch_array($sql);

$output[]=$row;
print(json_encode($output));


?>