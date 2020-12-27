<?php
include("../admin/conf.php");
$table = $_POST['tableName'];
$query="UPDATE $table SET status = '".$_POST['status']."' WHERE id ='".$_POST['statusId']."'  ";
$res = mysqli_query($con,$query);
// echo $query;
if($res)
	echo "Updated";
else
	echo "Not Updated";

?>