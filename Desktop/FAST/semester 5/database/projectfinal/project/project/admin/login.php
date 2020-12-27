<?php
include("conf.php");

if(isset($_POST['btn'])){
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	
	$query="select * from `registration` where email='$email' and pass='$pass'";
	$dis=mysqli_query($con,$query) or die(mysqli_error());
	while($row=mysqli_fetch_array($dis)){
		$_SESSION['registration']=$row['fname'];
	}
	$count=mysqli_num_rows($dis);
	if($count>0){
	echo	"<script>
		alert('Welcome User');
		document.location='Dashboard.php';
	</script>";
	}else{
		echo "<script>
			alert('Invalid User');
			document.location='login.php';
		</script>";
	}
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Login User</title>
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

<body class="login_body">
	<form method="post">
	<div class="container">
		<div class="row ">
		<div class="col-md-12">
			<div class="row box animated bounceInLeft">
				
			<div class="headl animated fadeInDownBig">
				
				
				<h1><a href="../index.php" class="logo_anker"><font color="#f57224">U</font><span class="logo_text_registraion">nique <span style="color:yellowgreen;">M</span>art.<span class="p_name">p</span><span class="k_name">k</span></span></a></h1>
				</div>
				<div class="col-md-12 hd"><span class="log">Sign In</span></div>
				<hr>
				<div class="col-md-12 ep">Email</div>
				<div class="col-md-12 em"><input type="email" class="form-control" name="email"/></div>
				
				<div class="col-md-12 ep">Password</div>
				<div class="col-md-12 em"><input type="password" class="form-control" name="pass"/></div>
				
				<div class="col-md-12 em"><input type="checkbox" class="chk hvr-pop"/><span class="rem">Remember me</span></div>
				<div class="col-md-12 emp"><input type="submit" class="btn1 btn-warning form-control" value="Login" name="btn"/></div>
				<div class="col-md-12 em" align="center"><a href="Registration.php" class="col-form-label-sm empegl">Registration an Account</a></div>
			<div class="col-md-12 em" align="center"><a href="forgot-password.php" class="col-form-label-sm">Forgot Password?</a></div>
				
			
				
				
				
			</div>
			</div></div>
	</div>
</form>	
</body>
</html>
