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
<title>View Product</title>
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

<body class="">
	<form method="post">
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
				
				?>
				</h6>Administrator
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
			<li class="side_bar_line"><a href="view product.php" class="side_bar1" style="color:#F8F8F9 !important;"><i class="fas fa-table icon_side_bar"></i>View Product</a></li>
			<li class="side_bar_line"><a href="order_admin.php" class="side_bar1"><i class="fa fa-check icon_side_bar"></i>orders</a></li>
			<li class="side_bar_line"><a href="delete product.php" class="side_bar1"><i class="fa fa-trash-alt icon_side_bar"></i>Delete Product</a></li>
			<li class="side_bar_line"><a href="update product.php" class="side_bar1"><i class="fas fa-sync icon_side_bar"></i>Update Product</a></li>
			<li class="side_bar_line"><a href="Registration.php" class="side_bar1"><i class="fas fa-fw fa-users icon_side_bar"></i>Add User</a></li>
			
			</ul>
				</div>
		<!--Side bar close-->
		
		<div class="col-md-9 float-left">
				
	<div class="row animated bounceInLeft view_box">
				
			<div class="head_view animated fadeInDownBig" style="text-decoration-style:solid;">
			Viewing Products
				
				</div>
				<table border="1" class="tbl_box">
  <tbody>
    <tr class="thp">
      <th scope="col">S.NO</th>
      <th scope="col">Categories</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">color</th>
      <th scope="col">New Price</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
	  
	  <?php
	  		$query="SELECT * FROM `addpro`";
	  $dis=mysqli_query($con,$query) or die(mysqli_error());
	  while($row=mysqli_fetch_array($dis)){
		  
		  $id=$row[0];
		  $cate=$row[1];
		  $img=$row[2];
		  $pname=$row[3];
		  $oprice=$row[4];
		  $nprice=$row[5];
		  $date=$row[6];
	  
	  
	  ?>
	  
    <tr>
      <td><?php echo $id;?></td>
      <td><?php echo $cate;?></td>
      <td style="width:165px;"><img src="upload/<?php echo $img;?>" alt="khini_image" height="80px" width="165px"/></td>
      <td><?php echo $pname;?></td>
      <td><?php echo $oprice;?></td>
      <td><?php echo $nprice;?></td>
	  <td><?php echo $date;?></td>
    
		<td> <a href="update product.php" id="anker_linku"> Update &nbsp</a> <a href="delete product.php?delete=<?php echo $id;?>" id="anker_linkd" class="dropdown-divider">Delete </a></td>
    </tr>
	 <?php
	  };?>
  </tbody>
</table>

				
			
				
				
				
			</div>
				
				</div></div><!--side bar close-->
	</div>
	
	
	
	
	
</form>
</body>
</html>
