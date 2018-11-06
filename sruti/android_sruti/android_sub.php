<?php

include 'android_connection.php';

$category_id=$_POST['category_id'];


$output=array();




$sql= mysqli_query($conn,"SELECT * FROM sub_category WHERE cat_id='$category_id'");
 

if(mysqli_num_rows($sql) > 0){

while($row=mysqli_fetch_assoc($sql))
{

$output[]=$row;

}



}

else{

$output[]="no_data";

}

print(json_encode($output));


?>

