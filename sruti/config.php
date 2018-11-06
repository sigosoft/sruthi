<?php
$conn = mysqli_connect("localhost","works_sruthi","admin@sruthi","works_sruthi");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>