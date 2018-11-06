<?php



include 'android_connection.php';

$key = $_POST['key'];


$sql="SELECT * FROM sub_category WHERE subname LIKE '%$key%'";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{
    $pass[]=$row;
}


}
else
{
   $pass[]="no data";
}

print_r(json_encode($pass));

?>