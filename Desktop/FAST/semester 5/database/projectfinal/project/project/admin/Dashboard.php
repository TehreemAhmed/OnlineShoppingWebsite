<?php
include("conf.php");

$userp=$_SESSION['registration'];
$query="select * from `registration` where fname='$userp'";
$dis=mysqli_query($con,$query) or die (mysqli_error());
$row=mysqli_fetch_array($dis);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
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
		});
	

</script>
	
</head>

<body class="dashboard_body">
	<form method="post">
<?php include("adminheader.php");?>
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
				
				?>
				
				</h6>Administrator
			</li>
			<li class="side_bar_line"><a href="Dashboard.php" class="side_bar1" style="color:#F8F8F9 !important;"><i class="fas fa-fw fa-tachometer-alt icon_side_bar"></i>Dashboard</a></li>
			<li class="side_bar_line"><i class="fa fa-caret-right arrow_down animated rotateInUpRight"></i><a  class="side_bar1" id="show_other"><i class="fas fa-user-alt icon_side_bar"></i>User <i class="fa fa-sort-down user_icon"></i>

							<div class="dropdown-menu user_box">
          
          
          <a class="dropdown-item" href="users.php">Registered user</a>
          <div class="dropdown-divider"></div>
		<h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="Registration.php">Register</a>
          <a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
        </div>

				
				</a></li>
			<li class="side_bar_line"><a href="add product.php" class="side_bar1"><i class="fab fa-adversal icon_side_bar"></i>Add Product</a></li>
			<li class="side_bar_line"><a href="view product.php" class="side_bar1"><i class="fas fa-table icon_side_bar"></i>View Product</a></li>
			<li class="side_bar_line"><a href="order_admin.php" class="side_bar1"><i class="fa fa-check icon_side_bar"></i>Orders</a></li>
			<li class="side_bar_line"><a href="delete product.php" class="side_bar1"><i class="fa fa-trash-alt icon_side_bar"></i>Delete Product</a></li>
			<li class="side_bar_line"><a href="update product.php" class="side_bar1"><i class="fas fa-sync icon_side_bar"></i>Update Product</a></li>
			<li class="side_bar_line"><a href="Registration.php" class="side_bar1"><i class="fas fa-fw fa-users icon_side_bar"></i>Add User</a></li>
			
			</ul>
				</div>
		<!--Side bar close-->
		
		<div class="col-md-9 float-left">
				
		
				
				</div></div><!--side bar close-->
	</div>
	
	
	
	
	
</form>
</body>
</html>
