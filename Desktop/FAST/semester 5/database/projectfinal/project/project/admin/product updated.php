<?php
include("conf.php");

if (isset($_GET['update'])){
	
	$id=$_GET['update'];

$query="select * from `addpro` where id='$id'";
  $dis=mysqli_query($con,$query)or die(mysqli_error());
  
  while($row=mysqli_fetch_array($dis)){
  	
  		
		$u_cate=$row[1];
		$up_image=$row[2];
		$up_name=$row[3];
		$color=$row[4];
		$u_oprice=$row[5];
		$u_nprice=$row[6];
		
  }


if (isset($_POST['ubtn'])){
	
	$scat=$_POST['u_cate'];
	$sname=$_POST['u_pname'];
	$scolor=$_POST['color'];
	$soprice=$_POST['u_oprice'];
	$snprice=$_POST['u_nprice'];
	
	$sfname=$_FILES['u_image']['name'];
	$sftype=$_FILES['u_image']['type'];
	$sfsize=$_FILES['u_image']['size'];
	$sftname=$_FILES['u_image']['tmp_name'];
	
	$target="upload/".$sfname;
	move_uploaded_file($sftname,$target);
	
	
	$query1="update `addpro` set `cate`='$scat',`img`='$sfname',`pname`='$sname',`color`='$scolor',`oprice`='$soprice',`nprice`='$snprice' where id='$id'";
	$dis1=mysqli_query($con,$query1)or die(mysqli_error());
	
	
	
	
	if($dis1){
		echo"<script>
		alert('Product Updated');
		document.location='update product.php';
        </script>";
		}else{
			echo"<script>
		alert('Data Not Updated');
		document.location='product updated.php';
        </script>";}
	
	}
}
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product Updated</title>
	<link href="img/shop-icon.png" rel="icon"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
	<link href="css/hover-min.css" rel="stylesheet"/>
	<link href="css/Animate-3.7.0.min.css" rel="stylesheet"/>
	<link href="css/all.min.css" rel="stylesheet"/>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<!-- <script src="js/jquery-3.3.1.slim.min.js"></script> -->
	<script src="js/popper.min.js"></script>
	<script src="js/all.min.js"></script>
	
	<script>
		$(document).ready(function(){
			
			$("#show_u").click(function(){
				$(".user_show").toggle();
			});
			
			$("#show_other").click(function(){
				$(".user_box").toggle();
			});
			
			$("#show_2").click(function(){
				$(".user_show2").toggle();
			});
			
			$("#show_1").click(function(){
				$(".user_show1").toggle();
			});
			
			$("#dropdownMenuButton").click(function(){
				$(".em .dropdown-menu").toggle();
			});
		});
	

</script>
	
</head>

<body class="dashboard_body">
	<form method="post" enctype="multipart/form-data">
<header><div class="row" style="width:100%!important; padding: 0px 0px 0px 20px;">
	<div class="col-md-4"><a class="logo_anker" href="../index.php"><h1><font color="#f57224">U</font><span class="logo_text">nique <span style="color:yellowgreen;">M</span>art.<span class="p_name">p</span><span class="k_name">k</span></span></h1></a></div>
	<div class="col-md-3 float-right">
		
		<li class="rele"><i class="fa fa-user-circle icon1" id="show_u"></i>
			<div class="dropdown-menu user_show">
          
          <a class="dropdown-item" href="#">Setting</a>
          <a class="dropdown-item" href="#">Activity</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
		
		
	<i class="fa fa-bell icon3" id="show_1"></i>
			<div class="dropdown-menu user_show1">
          
           <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
			
	<i class="fa fa-envelope icon2" id="show_2"></i>
			
		<div class="dropdown-menu user_show2">
          
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
			
			</li></div>
	<div class="col-md-5 sear">
	<input type="search" class="form-control sbox" placeholder="Search for..."/>
	<div class="icon_box"></div><i class="fa fa-search icon"></i>
	</div>
	</div></header>
			<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 col_side_bar">
		<ul class="side_bar">
			
			<li class="card-img img_div"><img src="upload/<?php echo $row[3];?>" height="90px" width="90px" alt="khina_image" class="user-img"/>
			<h6 class="user_name">	
				<?php
				if(isset($_SESSION['registration'])){
					echo $_SESSION['registration'];
				}else{
					echo "<script>
						document.location='login.php';
					</script>";
					}
				
				?></h6>Administrator
			</li>
			<li class="side_bar_line"><a href="Dashboard.php" class="side_bar1"><i class="fas fa-fw fa-tachometer-alt icon_side_bar"></i>Dashboard</a></li>
			
			<li class="side_bar_line"><i class="fa fa-caret-right arrow_down animated rotateInUpRight"></i><a  class="side_bar1" id="show_other"><i class="fas fa-user-alt icon_side_bar"></i>User <i class="fa fa-sort-down user_icon"></i>

				<div class="dropdown-menu user_box">
					<h6 class="dropdown-header">Other User:</h6>
					
					<a class="dropdown-item" href="users.php?shop=1">Shop Users</a>
					<a class="dropdown-item" href="users.php?admin=1">Registered users</a>
					<div class="dropdown-divider"></div>
					<h6 class="dropdown-header">Login Screens:</h6>
					<a class="dropdown-item" href="login.php">Login</a>
					<a class="dropdown-item" href="Registration.php">Register</a>
					<a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
				</div>

				
				</a></li>
			<li class="side_bar_line"><a href="add product.php" class="side_bar1"><i class="fab fa-adversal icon_side_bar"></i>Add Product</a></li>
			<li class="side_bar_line"><a href="view product.php" class="side_bar1"><i class="fas fa-table icon_side_bar"></i>View Product</a></li>
			<li class="side_bar_line"><a href="order_admin.php" class="side_bar1"><i class="fa fa-check icon_side_bar"></i>orders</a></li>
			<li class="side_bar_line"><a href="delete product.php" class="side_bar1"><i class="fa fa-trash-alt icon_side_bar"></i>Delete Product</a></li>
			<li class="side_bar_line"><a href="update product.php" class="side_bar1" style="color:#F8F8F9 !important;"><i class="fas fa-sync icon_side_bar"></i>Update Product</a></li>
			<li class="side_bar_line"><a href="Registration.php" class="side_bar1"><i class="fas fa-fw fa-users icon_side_bar"></i>Add User</a></li>
			
			</ul>
				</div>
		<!--Side bar close-->
		
		<div class="col-md-9 float-left">
				
			<div class="row box1 animated bounceInLeft">
				
			<div class="head1 animated fadeInDownBig" style="left: 110px!important;">
			<?php
				if(isset($_SESSION['registration'])){
					echo $_SESSION['registration'];
				}
				
				?>
				
				</div>
				<div class="col-md-12 hd1"><span class="log">Add Product</span></div>
				<hr>
				<div class="col-md-12 ep1">
				Product Categories
				
				</div>
				<div class="col-md-12 em">
  <select class="form-control" name="u_cate">  
	 	 <option value="m_shoes"> Men Shoes</option>
					</select>
	  
  
</div>
				
				<div class="col-md-12 ep1">New Product</div>
				<div class="col-md-12 em">
									<label class="file_main">
      <input type="file" class="form-control" name="u_image" value="<?php echo $up_image?>" style="height: 40px; width: 121%!important; paddind-left:22px!important;"> 
      <span class="btn_file_addpro btn-primary" style="height: 40px; top:0px; box-shadow: none;     left: 14px;">Product Image</span>
   				 </label> 
				</div>
				<div class="col-md-12 ep1">Product Name</div>
				<div class="col-md-12 em"><input type="text" class="form-control" name="u_pname" value="<?php echo $up_name?>"></div>
				<div class="col-md-12 ep1">color</div>
				<div class="col-md-12 em"><input type="text" class="form-control" name="color" value="<?php echo $color?>"></div>
				<div class="col-md-12 ep1">Old Price</div>
				<div class="col-md-12 em"><input type="text" class="form-control" name="u_oprice" value="<?php echo $u_oprice?>"></div>
				
					<div class="col-md-12 ep1">New Price</div>
				<div class="col-md-12 em"><input type="text" class="form-control" name="u_nprice" value="<?php echo $u_nprice?>"></div>
				
				<div class="col-md-12 emp"><input type="submit" class="btn2 btn-warning" value="Update" name="ubtn"></div>
				
			
				
				
				
		</div></div>
				
				</div></div><!--side bar close-->
	</div>
	
	
	
	
	
</form>
</body>
</html>
