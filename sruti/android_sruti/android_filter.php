

<?php 

include 'android_connection.php';

$song_name = $_POST['song_name'];



$sql= mysqli_query($conn,"SELECT song.* ,sub_category.subname FROM song INNER JOIN sub_category ON song.subcat_id=sub_category.subcat_id  WHERE songname='$song_name'");

$row=mysqli_fetch_array($sql);

$output[]=$row;
print(json_encode($output));


?>