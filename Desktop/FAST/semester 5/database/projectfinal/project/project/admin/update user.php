 <?php
include("conf.php");
	

if (isset($_GET['update'])){
	
	$id=$_GET['update'];

$query="select * from `registration` where id='$id'";
  $dis=mysqli_query($con,$query)or die(myqli_error());
  
  while($row=mysqli_fetch_array($dis)){
  	
  		
		$uf_name=$row[1];
		$ul_name=$row[2];
		$u_image=$row[3];
		$u_email=$row[4];
		$u_tele=$row[5];
	  $u_gender=$row[6];
	  $u_day=$row[7];
	  $u_month=$row[8];
	  $u_year=$row[9];
	  $u_pass=$row[10];
	  $u_cpass=$row[11];
		
  }

	
if(isset($_POST['ubtn'])){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];	
	$tele=$_POST['tele'];
	$gender=$_POST['gender'];
	$day=$_POST['day'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	
	if(isset($_FILES['image'])){
		$filen=$_FILES['image']['name'];
		$itype=$_FILES['image']['type'];
		$isize=$_FILES['image']['size'];
		$tmp_name=$_FILES['image']['tmp_name'];
		
		$target="upload/".$filen;
		
		move_uploaded_file($tmp_name,$target);
	}
	


	$query="update `registration` set `fname`='$fname', `lname`='$lname', `img`='$filen', `email`='$email', `tele`='$tele', `gender`='$gender', `day`='$day', `month`='$month', `year`='$year', `pass`='$pass', `cpass`='$cpass' where id='$id'"; 
	
	
	
	if($pass==$cpass){
		$query=mysqli_query($con,$query) or die (mysqli_error());
		echo"
		<script>
		alert('Password Match');
		</script>";
	}else{
		echo"
		<script>
		alert('Password do not match');
		</script>";
	}
	
	
	if($query){
		echo"
		<script>
		alert('Update user');
			document.location='users.php';
		
		</script>
		";
	}else{
		echo"
		<script>
		alert('user not updated');
		</script>;
		";
	}
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update user</title>
	<link href="img/shop-icon.png" rel="icon"/>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
	<link href="css/hover-min.css" rel="stylesheet"/>
	<link href="css/Animate-3.7.0.min.css" rel="stylesheet"/>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<!-- <script src="js/jquery-3.3.1.slim.min.js"></script> -->
	<script src="js/popper.min.js"></script>
	
</head>

<body class="registration_body">
	<form method="post" enctype="multipart/form-data">
	<div class="container">
		<div class="row ">
		<div class="col-md-12">
			<div class="row box2 animated bounceInLeft" style="height: 535px;">
				
			<div class="head animated fadeInDownBig">
				
				<h1><a href="../index.php" class="logo_anker"><font color="#f57224">U</font><span class="logo_text_registraion">nique <span style="color:yellowgreen;">M</span>art.<span class="p_name">p</span><span class="k_name">k</span></span></a></h1>
				
				</div>
				<div class="col-md-12 hd"><span class="log">Registration an Account</span></div>
				<hr>
				
				<div class="col-md-12 em">
				
				<input type="text" placeholder="First name" class="mam" name="fname" value="<?php echo $uf_name?>"/>
				<input type="text" placeholder="Last name" class="mam1" name="lname" value="<?php echo $ul_name?>"/>
					
				</div>
				
				<div class="col-md-12 em">
									<label>
      <input type="file" class="form-control" name="image" value="<?php echo $u_image?>"/> 
      <span class="btn_file btn-primary">Profile pic</span>
   				 </label> 
				</div>
				
				<div class="col-md-12 em"><input type="email" class="form-control" placeholder="Email address" name="email" value="<?php echo $u_email?>"/></div>
				<div class="col-md-12 em"><input type="number" class="form-control" placeholder="Telephone" name="tele" value=" <?php echo $u_tele?>"/></div>
				
				
				<div class="col-md-12 em">
				<select name="gender" class="form-control" style="cursor:pointer;" value="<?php echo $u_gender?>">
							<option value="">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
				</div>
				
				<div class="col-md-12">
					<select name="day" class="mam2" value="<?php echo $u_day?>">
					<option value="Day:">Day</option>
					<script>for(i=1;i<=31;i++)
							{document.write("<option value='"+i+"'>" + i + "</option>");}
					
						</script></select>
						
				
				<select name="month" class="mam2"  style="cursor:pointer;" value="<?php echo $u_month?>">
								<option value="Month:">Month</option>
								<option value="Jan">Jan</option>
								<option value="Feb">Feb</option>
								<option value="Mar">Mar</option>
								<option value="Apr">Apr</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="Aug">Aug</option>
								<option value="Sep">Sep</option>
								<option value="Oct">Oct</option>
								<option value="Nov">Nov</option>
								<option value="Dec">Dec</option>
								
							</select>
					
						<select name="year" class="mam2"  style="cursor:pointer;" value="<?php echo $u_year?>">
								<option value="Year:"> Year</option>
									<script type="text/javascript">
									for(i=2019;i>=1960;i--)
									{
									document.write("<option value='"+i+"'>" + i + "</option>");
									}
									</script>
							</select>
				</div>
				
				
				
				
				
				
				<div class="col-md-12 em"><input type="password" class="form-control" placeholder="Password" name="pass" value="<?php echo $u_pass?>"/></div>
				
				<div class="col-md-12 em"><input type="password" class="form-control" placeholder="Conform Password" name="cpass" value="<?php echo $u_cpass?>"/></div>
				
				<div class="col-md-12 emp"><input type="submit" class="btn3 btn-warning form-control" value="User Update" name="ubtn"/></div>
				<div class="col-md-12 em" align="center"><a href="login.php" class="col-form-label-sm empe">Log in</a></div>
			<div class="col-md-12 em" align="center"><a href="forgot-password.php" class="col-form-label-sm">Forgot Password?</a></div>
				
				
			
			</div>
			</div></div>
	</div>
</form>	
</body>
</html>
