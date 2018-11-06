<?php

include 'android_connection.php';


$output=array();

$sql= mysqli_query($conn,"SELECT * FROM category WHERE block=0");
 

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

