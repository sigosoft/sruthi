<?php

include 'android_connection.php';

$category_id=$_POST['category_id'];
$subcat_id=$_POST['subcat_id'];


$output=array();




$sql= mysqli_query($conn,"SELECT * FROM song WHERE cat_id='$category_id' AND subcat_id='$subcat_id'");
 

if(mysqli_num_rows($sql) > 0){

while($row=mysqli_fetch_assoc($sql))
{

$output[]=$row;

}



}

else{

echo "no_data";

}

print(json_encode($output));


?>

