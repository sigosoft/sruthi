<?php
session_start();
include "config.php";

if(isset($_GET['id']))
{
$id=$_GET['id'];
$query=mysqli_query($conn,"DELETE FROM category WHERE cat_id='$id'");
if($query)
{
header('location:viewcategory.php');
}
}
?>