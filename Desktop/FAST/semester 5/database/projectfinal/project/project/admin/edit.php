<?php
include("conf.php");

if (isset($_GET['update'])){
	
	$id=$_GET['update'];

$query="select * from `addpro` where id='$id'";
  $dis=mysqli_query($con,$query)or die(myqli_error());
  
  while($row=mysqli_fetch_array($dis)){
  	
  		
		$ucat=$row[1];
		$ufile=$row[2];
		$uname=$row[3];
		$uoprice=$row[4];
		$unprice=$row[5];
		
  }


if (isset($_POST['sbtn'])){
	
	$scat=$_POST['scat'];
	$sname=$_POST['sname'];
	$soprice=$_POST['soprice'];
	$snprice=$_POST['snprice'];
	
	$sfname=$_FILES['sfile']['name'];
	$sftype=$_FILES['sfile']['type'];
	$sfsize=$_FILES['sfile']['size'];
	$sftname=$_FILES['sfile']['tmp_name'];
	
	$target="upload/".$sfname;
	move_uploaded_file($sftname,$target);
	
	
	$query1="update `addpro` set `cate`='$scat',`img`='$sfname',`pname`='$sname',`oprice`='$soprice',`nprice`='$snprice' where id='$id'";
	$dis1=mysqli_query($con,$query1)or die(mysqli_error());
	
	if($dis1){
		echo"<script>
		alert('Product Updated');
		document.location='update product.php';
        </script>";
		}else{
			echo"<script>
		alert('Data Not Updated');
		document.location='edit.php';
        </script>";}
	
	}
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link href="main.css" rel="stylesheet">
  <title>Untitled Document</title>
</head>

<body>
<header>
<div class="container">
<div class="row">
<div class="col-md-4 head"><h1><a href="index.php">TMART</a></h1></div>
<div class="col-md-6 menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="">Portfolio</a></li>
<li><a href="">Blog</a></li>
<li><a href="">Shop</a></li>
<li><a href="">Pages</a></li>
<li><a href="">Contact</a></li>
</ul>
</div>
<div class="col-md-2 menu2">
<ul>
<h5>

</h5>
<li><a href="login.php" class="fa fa-user"></a></li>
<li><a href="logout.php" class="fa fa-sign-out"></a></li>
</ul>

</div>
</div>
</div>
</header>


<nav>
<div class="container">
<div class="row">
<div class="col-md-3 dashboard">
<ul>

<li class="btn-dark"><a href="dashboard.php">Dashboard</a></li>
<li class="btn-dark"><a href="addpro.php">Add Product</a></li>
<li class="btn-dark"><a href="viewpro.php">View Product</a></li>
<li class="btn-dark"><a href="">Add User</a></li>
<li class="btn-dark"><a href="">Activity</a></li>
<li class="btn-dark"><a href="">View Orders</a></li>
</ul>
</div>

<div class="col-md-9 main">
<form method="post" enctype="multipart/form-data">
<table width="600" align="center">
  <tr>
    <td>Category</td>
    <td>
    <select class="form-control" name="scat">
    <option value="womencloth">women's clothing</option>
    <option value="mencloth">men's fashion</option>
    <option value="computer">Computer & office</option>
    <option value="jewelry">Jewlery & watches</option>
    <option value="mencloth">Men's clothing</option>
    <option value="bagshoes">Bags & shoes</option>
    <option value="automobile">Automobile</option>
    <option value="electronic">Consumer Electronic</option>
    <option value="all">All accesories</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Name</td>
    <td><input type="text" placeholder="Name" class="form-control" name="sname" value="<?php echo $uname;?>"></td>
  </tr>
  <tr>
    <td>Media</td>
    <td><input type="file" name="sfile" value="<?php echo $ufile;?>"></td>
  </tr>
  <tr>
    <td>Old Price</td>
    <td><input type="number" class="form-control" name="soprice" value="<?php echo $uoprice?>"></td>
  </tr>
  <tr>
    <td>New Price</td>
    <td><input type="number" class="form-control" name="snprice" value="<?php echo $unprice?>"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" class="btn btn-dark" name="sbtn" value="Update"></td>
  </tr>
</table>


</form>
</div>
</div>
</div>
</nav>

<div class="footer">
<div class="container">
<div class="row">
<div class="col-md-12 foot">
<span>© 2019 T-Mart All Right Reserved.</span>
</div>
</div>
</div>
</div>