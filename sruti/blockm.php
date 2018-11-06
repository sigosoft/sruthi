<?php
session_start();
include "config.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
$sql = "UPDATE category SET block ='0' WHERE cat_id='$id'" or mysqli_error();
$result = mysqli_query($conn, $sql);
if($result)
{
header('location:viewcategory.php');
}

?>

