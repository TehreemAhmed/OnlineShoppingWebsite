<?php 
include("conf.php");
$userp=$_SESSION['registration'];
$query="select * from `registration` where fname='$userp'";
	$dis=mysqli_query($con,$query) or die(mysqli_error());
	$row=mysqli_fetch_array($dis);

	if(isset($_GET['admin']))
	{
		$titlePage = "Registered User";
		$tableName = "registration";	
	}
	else
	{
		$titlePage = "Shopper User";
		$tableName = "shopper";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?= $titlePage; ?></title>
	<link href="img/shop-icon.png" rel="icon"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
	<link href="css/hover-min.css" rel="stylesheet"/>
	<link href="css/Animate-3.7.0.min.css" rel="stylesheet"/>
	<link href="css/all.min.css" rel="stylesheet"/>
	<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet"/> <!-- DATATABLE CDN -->

	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="js/jquery-3.3.1.slim.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/all.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> <!-- DATATABLE CDN -->
	


	<script>
		$(document).ready(function(){

			$(document).ready(function() {
				$('.datatable').DataTable();
			} );
			
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

			$(".statuseclipse").click(function(){
				$(this).parent().find("select").toggle();
			});
			$(".statusSelect").change(function(){
				var status = $(this).val();
				var statusId = $(this).attr("id");
				var tableName = "<?php echo $tableName; ?>";
				event.preventDefault();

				$.ajax({
					type:'POST',
					data: {statusId:statusId, tableName:tableName, status:status},
					url:"../ajax/update_status.php", //php page URL where we post this data to save in database
					success: function(result){
						console.log(result);
						window.location.reload();
					}
				})
			});
		});



</script>
	
</head>

<body class="">
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
				 echo "
				 <script> document.location='login.php'; </script>
				 ";
			 }
				
				?>
				</h6>Administrator
			</li>
			<li class="side_bar_line"><a href="Dashboard.html" class="side_bar1"><i class="fas fa-fw fa-tachometer-alt icon_side_bar"></i>Dashboard</a></li>
			
						<li class="side_bar_line"><i class="fa fa-caret-right arrow_down animated rotateInUpRight"></i><a  class="side_bar1" id="show_other" style="color:#F8F8F9 !important;"><i class="fas fa-user-alt icon_side_bar"></i>User <i class="fa fa-sort-down user_icon"></i>

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
				
			<li class="side_bar_line" id="drop"><a href="add product.php" class="side_bar1"><i class="fab fa-adversal icon_side_bar"></i>Add Product</a></li>
			<li class="side_bar_line"><a href="view product.php" class="side_bar1"><i class="fas fa-table icon_side_bar"></i>View Product</a></li>
			<li class="side_bar_line"><a href="conform product.php" class="side_bar1"><i class="fa fa-check icon_side_bar"></i>Conform Product</a></li>
			<li class="side_bar_line"><a href="delete product.php" class="side_bar1"><i class="fa fa-trash-alt icon_side_bar"></i>Delete Product</a></li>
			<li class="side_bar_line"><a href="update product.php" class="side_bar1"><i class="fas fa-sync icon_side_bar"></i>Update Product</a></li>
			<li class="side_bar_line"><a href="Registration.php" class="side_bar1"><i class="fas fa-fw fa-users icon_side_bar"></i>Add User</a></li>
			
			</ul>
				</div>
		<!--Side bar close-->
<!-- <div class="col-md-4 "> -->
<!-- </div> -->
<div class="col-md-9 ">
		<h1 class="HeadingAboveDT text-center"><?= $titlePage; ?></h1>
		<table  class=" datatable table-responsive">
		  	<thead>
		    <tr>
		      <th >User i'd</th>
		      <th >First Name</th>
		      <th >User Pic</th>
		      <th >Email</th>
		      <th >Contact</th>
		      <th >Gender</th>
		      <th >Day</th>
		      <th >Month</th>
		      <th >Year</th>
		      <th >Action</th>
		      <th >Status</th>
		    </tr>
		  	<thead>
			  
			<?php
				$query="SELECT * FROM $tableName";
				$dis=mysqli_query($con,$query) or die(mysqli_error());
			?>
			  
		  	<tbody>
			<?php while($row=mysqli_fetch_array($dis)){

				$id=$row[0];
				$fname=$row[1];
				$lname=$row[2];
				$upic=$row[3];
				$email=$row[4];
				$tele=$row[5];
				$gender=$row[6];
				$day=$row[7];
				$month=$row[8];
				$year=$row[9];
				$pass=$row[10];
				$cpass=$row[11];
				$status=$row['status'];
				if($status == 0){
					$statusText = "Inactive";
					$statusTextcolor = " style='color:red' ";
				}
				else{
					$statusText = "Active";
					$statusTextcolor = " style='color:green' ";
				}
				?>
		    <tr>
				<td><?php echo $id;?></td>
				<td><?php echo $fname;?></td>
				<td style="width:115px;"><img src="upload/<?php echo $upic;?>" alt="khini_image" height="80px" width="115px"/></td>
				<td><?php echo $email;?></td>
				<td><?php echo $tele;?></td>
				<td><?php echo $gender;?></td>
				<td><?php echo $day;?></td>
				<td><?php echo $month;?></td>
				<td><?php echo $year;?></td>

		    
				<td> <a href="update user.php?update=<?php echo $id;?>" id="anker_linku"> Update</a> <a href="delete_user.php?delete=<?php echo $id;?>" id="anker_linkd" class="dropdown-divider">Delete </a></td>
				<td <?=$statusTextcolor?> ><?php echo $statusText;?> 
				<i class="fa fa-ellipsis-h fa-sm statuseclipse" id="statuseclipse" title="Change status by clicking here" ></i>
					<select style="display: none;" id="<?=$id?>" class="statusSelect">
						<option value="0" <?php echo ($status==0)?("Selected"):(""); ?> >Inactive</option>
						<option value="1" <?php echo ($status==1)?("Selected"):(""); ?>>Active</option>
					</select>
				</td>
			</tr>
			 <?php
			  };?>
		 	</tbody>

		 	<tfoot>
		    <tr>
				<th >User i'd</th>
				<th >First Name</th>
				<th >User Pic</th>
				<th >Email</th>
				<th >Contact</th>
				<th >Gender</th>
				<th >Day</th>
				<th >Month</th>
				<th >Year</th>
				
				<th >Action</th>
		      	<th >Status</th>

			</tr>
		  	</tfoot>

		</table>
</div>
	
	
</body>
</html>
