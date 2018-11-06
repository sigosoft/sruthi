<?php

include 'android_connection.php';


$output=array();

$sql= mysqli_query($conn,"SELECT * FROM category WHERE block=1");
 

if(mysqli_num_rows($sql) > 0){

while($row=mysqli_fetch_assoc($sql))
{
    

    $cat_id=$row['cat_id'];
    $cat_name=$row['catname'];
    
    $check=mysqli_query($conn,"SELECT * FROM sub_category WHERE cat_id='$cat_id'");
    $list=mysqli_fetch_assoc($check);
    if(mysqli_num_rows($check)>0)
    {
    	$sub=1;
    }    
    else
    {
    	$sub=0;

    }
    
    $output['category_id']=$cat_id;
    $output['category']=$cat_name;
    $output['sub']=$sub;
    
    $pass[]=$output;
    
}



}

else{

    $output['category']="No data";
    $output['sub']="No data";
    
    $pass[]=$output;
    
}

print(json_encode($pass));


?>

