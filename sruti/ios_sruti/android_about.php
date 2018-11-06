<?php 

include 'android_connection.php';



$image=array();

$sql="SELECT * FROM about WHERE aid=1";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$output['content']=$row['content'];

$image="SELECT * FROM aboutimages";
$i_result=mysqli_query($conn,$image);
while($list=mysqli_fetch_assoc($i_result))
{
   $test[]=$list;

}


$output['image']=$test;

$pass['about']=$output;


print_r(json_encode($pass));





?>