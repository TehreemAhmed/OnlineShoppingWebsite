<?php
include("conf.php");
$userp=$_SESSION['registration'];
$query="select * from `registration` where fname='$	'";
$dis=mysqli_query($con,$query) or die (mysqli_error());
$row=mysqli_fetch_array($dis);

if(isset($_POST['btn'])){
	$cate=$_POST['cate'];
	$color=$_POST['color'];
	$pname=$_POST['pname'];
	$oprice=$_POST['oprice'];
	$nprice=$_POST['nprice'];
	
	if(isset($_FILES['image'])){
		$iname=$_FILES['image']['name'];
		$itype=$_FILES['image']['type'];
		$isize=$_FILES['image']['size'];
		$tmp_name=$_FILES['image']['tmp_name'];
		
		$target="upload/".$iname;
		move_uploaded_file($tmp_name,$target);
	}
	
	$query="insert into `addpro`(`id`, `cate`, `color`, `img`, `pname`, `oprice`, `nprice`, `date`) values ('','$cate','$color', '$iname', '$pname','$oprice','$nprice',now())";
	$res=mysqli_query($con,$query) or die (mysqli_error());
	
	if($res){
			echo "
			<script>
				alert('New Product Added');
			</script>";
			}else{
				echo "<script>
					alert('Product not added');
				</script>";
				}
	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Product</title>
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
					<a class="dropdown-item" href="#">Mamoon Siddiqui</a>
					<a class="dropdown-item" href="users.php?shop=1">Shop Users</a>
					<a class="dropdown-item" href="users.php?admin=1">Registered users</a>
					<div class="dropdown-divider"></div>
					<h6 class="dropdown-header">Login Screens:</h6>
					<a class="dropdown-item" href="login.php">Login</a>
					<a class="dropdown-item" href="Registration.php">Register</a>
					<a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
				</div>

				
				</a></li>
			<li class="side_bar_line"><a href="add product.php" class="side_bar1" style="color:#F8F8F9 !important;"><i class="fab fa-adversal icon_side_bar"></i>Add Product</a></li>
			<li class="side_bar_line"><a href="view product.php" class="side_bar1"><i class="fas fa-table icon_side_bar"></i>View Product</a></li>
			<li class="side_bar_line"><a href="order_admin.php" class="side_bar1"><i class="fa fa-check icon_side_bar"></i>orders</a></li>
			<li class="side_bar_line"><a href="delete product.php" class="side_bar1"><i class="fa fa-trash-alt icon_side_bar"></i>Delete Product</a></li>
			<li class="side_bar_line"><a href="update product.php" class="side_bar1"><i class="fas fa-sync icon_side_bar"></i>Update Product</a></li>
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
              <!-- /*  Code By Zeeshan */ -->
				<div class="col-md-12 em">
				  	<select class="form-control" name="cate">  
						<option value="casual"> Casual Shoes</option>
						<option value="athletic"> Athletic Shoes</option>
						<option value="bridal"> Bridal Shoes</option>
						<option value="comfort"> Comfort Shoes</option>
						<option value="new_releases"> New Releases</option>
					</select>
				</div>
				
				<div class="col-md-12 ep1">
				Product Color
				</div>
				<div class="col-md-12 em">
				  	<select class="form-control" name="color">  
						<option value="white"> White</option>
						<option value="black"> Black</option>
						<option value="red"> Red</option>
						<option value="blue"> Blue</option>
						<option value="white_black"> White & Black</option>
					</select>
				</div>
              <!-- /*  Code By  */ -->
				
				<div class="col-md-12 ep1">New Product</div>
				<div class="col-md-12 em">
									<label class="file_main">
      <input type="file" class="form-control" name="image" style="height: 40px; width: 121%!important; paddind-left:22px!important;"> 
      <span class="btn_file_addpro btn-primary" style="height: 40px; top:0px; box-shadow: none;     left: 14px;">Product Image</span>
   				 </label> 
				</div>
				<div class="col-md-12 ep1">Product Name</div>
				<div class="col-md-12 em"><input type="text" class="form-control" name="pname"></div>

				<div class="col-md-12 ep1">color</div>
				<div class="col-md-12 em"><input type="text" class="form-control" name="color"></div>

				<div class="col-md-12 ep1">old price</div>
				<div class="col-md-12 em"><input type="text" class="form-control" name="oprice"></div>
				
					<div class="col-md-12 ep1">New Price</div>
				<div class="col-md-12 em"><input type="text" class="form-control" name="nprice"></div>
				
				<div class="col-md-12 emp"><input type="submit" class="btn2 btn-warning" value="Add" name="btn"></div>
				
			
				
				
				
		</div></div>
				
				</div></div><!--side bar close-->
	</div>
	
	
	
	
	
</form>
</body>
</html>
