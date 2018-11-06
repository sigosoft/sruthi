<?php
include "config.php";

$id = $_POST['id'];
echo "<option value='0' selected>Sub Category</option> "; 
   $result1    = mysqli_query($conn,"SELECT * from sub_category WHERE cat_id='$id'");
  


    


while ($row1 = mysqli_fetch_array($result1))
{
    echo "<option value=".$row1['subcat_id'].">".$row1['subname']."</option>";
}
?>