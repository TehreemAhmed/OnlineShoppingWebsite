<?php
include("../admin/conf.php");

$query="INSERT INTO rating (usrId,prodId,rating, revDesc) 
VALUES('".$_POST['shopperId']."','".$_POST['prodId']."','".$_POST['rating']."','".$_POST['revDesc']."' )  ";

var_dump($query);

$res = mysqli_query($con,$query);
if($res)
	echo "Updated";
else
	echo "Not Updated";

?>