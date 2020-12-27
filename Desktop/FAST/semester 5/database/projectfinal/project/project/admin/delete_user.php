<?php
include("conf.php");
	
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		
		$query="delete from `registration` where id='$id'";
		$res=mysqli_query($con,$query) or die (mysqli_error());
		
		if($res){
			echo "<script>
				alert('User Delete');
				document.location='login.php';
			</script>";
			}else{
				echo "<script>
					alert('Product not Delete');
				</script>";
				}
		
		}


?>