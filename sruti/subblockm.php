<?php
session_start();
include "config.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
$sql = "UPDATE sub_category SET block ='0' WHERE subcat_id='$id'" or mysqli_error();
$result = mysqli_query($conn, $sql);
if($result)
{
header('location:viewsubcategory.php');
}

?>

