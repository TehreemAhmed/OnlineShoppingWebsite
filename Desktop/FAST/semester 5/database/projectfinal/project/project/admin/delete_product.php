<?php
include("conf.php");
	
if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		
		$query="delete from `addpro` where id='$id'";
		$res=mysqli_query($con,$query) or die (mysqli_error());
		
		if($res){
			echo "<script>
				alert('Product Delete');
				document.location='delete product.php';
			</script>";
			}else{
				echo "<script>
					alert('Product not Delete');
				</script>";
				}
		
		}



?>