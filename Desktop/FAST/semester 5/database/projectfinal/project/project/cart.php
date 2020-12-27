<?php
include('admin/conf.php');

       $Id='';
   if(isset($_GET['id'])){
       $Id=$_GET['id'];

       $Action="";
	   if(isset($_GET['action']))
    	   $Action=$_GET['action'];

    	$ip = $_SERVER['REMOTE_ADDR'];
		
	$sessionId = md5($ip);
		// var_dump($_SESSION['shopperId']);
function cartExists($action =""){
	global $con, $ip, $Id;
	$sessionId = "";
	if(isset($_SESSION['shopper']))
		$sessionId = md5($_SESSION['shopperId']);
	else
		$sessionId = md5($ip);
	
	$condition = " ";
	if($action == "updation")
		$condition = " AND pId = '".$Id."' AND ordered = 0 ";

	$query="select COUNT(*) AS totalCart from `cart` where sessionId ='". $sessionId. "' $condition ";
	$res=mysqli_query($con,$query);
	$res = mysqli_fetch_array($res);
	$alreadyData = $res[0];
	return $alreadyData;
}

function getCartQty($action =""){
	global $con, $ip, $Id;
	$sessionId = "";
	if(isset($_SESSION['shopper']))
		$sessionId = md5($_SESSION['shopperId']);
	else
		$sessionId = md5($ip);
	
	$condition = " ";


	$query="select qty AS quantity from `cart` where sessionId ='". $sessionId. "' ";
	$res=mysqli_query($con,$query);
	$res = mysqli_fetch_array($res);
	$alreadyData = $res[0];
	return $alreadyData;
}

function updateCart($pId = 0, $qty =0, $action = ''){	
	global $con, $ip;
	$sessionId = "";

	if(isset($_SESSION['shopper']))
		$sessionId = md5($_SESSION['shopperId']);
	else
		$sessionId = md5($ip);

	if($action == 'add')
	{
		if(cartExists("updation") > 0)
		{
			$query="UPDATE `cart` SET qty = qty + ". $qty. " WHERE sessionId = '". $sessionId. "' AND pId = '". $pId. "'  ";
			$res=mysqli_query($con,$query);
			header('location:cart.php?id='.$pId.'action;');
		}
		else
		{
			$query=" INSERT INTO `cart` (pId, qty, sessionId) VALUES ('". $pId. "', '". $qty. "', '". $sessionId. "') ";
			$res=mysqli_query($con,$query);
			header('location:cart.php?id='.$pId.'action;');
		}
	}
	elseif($action == "remove")
	{
		if(getCartQty() == 1)
		{
			$query=" DELETE FROM `cart` WHERE pId = '". $pId. "' AND sessionId = '". $sessionId. "' ";
			$res=mysqli_query($con,$query);
			header('location:cart.php?id='.$pId.'action;');
		}
		else
		{
			$query="UPDATE `cart` SET qty = qty - ". $qty. " WHERE sessionId = '". $sessionId. "' AND pId = '". $pId. "'  ";
			$res=mysqli_query($con,$query);
			header('location:cart.php?id='.$pId.'action;');
		}


	}
	elseif ($action == "delete") 
	{
		$query=" DELETE FROM `cart` WHERE sessionId = '". $sessionId. "' ";
		$res=mysqli_query($con,$query);
		header('location:cart.php?id='.$pId.'action;');
	}

}



       switch($Action){
               
           case "add":
                   updateCart($Id, 1, 'add' );
               break;
               
               case "remove":
                $_SESSION['cart'][$Id]--;
                   updateCart($Id, 1, 'remove' );
               break;
               
               case "clear":
               updateCart($Id, 1, 'delete' );
             
               echo"
               <script>
               window.location='index.php';
               </script>";
       }


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Your Cart</title>
<link href="admin/img/favicon.png" rel="icon"  type="image/png" sizes="32x32"/>
<link href="admin/css/bootstrap.4.3.1.min.css" rel="stylesheet"/>
<link href="admin/css/main.css" rel="stylesheet"/>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- <script src="admin/js/jquery-3.3.1.slim.min.js"></script> -->
<script src="admin/js/bootstrap.4.3.1.min.js"></script>
<script src="admin/js/popper.1.14.7.min.js"></script>
<link href="admin/css/hover-min.css" rel="stylesheet"/>
<link href="admin/css/Animate-3.7.0.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.css" />
	<style>
		
.sup{
	color:white;
	font-weight: bold;
}

.sub{
	color:white;
	font-weight: bold;
	
}


.sup:hover{
	color:white;
	font-weight: bold;
	text-decoration: none;
}

.sub:hover{
	color:white;
	font-weight: bold;
	text-decoration: none;
}
		.logo a{
			color:#8a8a89;
		}
	</style>
</head>

<body>
<div class="container-fluid"> 
  <!--Header start-->
 <?php
 include("admin/header.php");
 ?>
  <!--Header close-->
  <div class="container-fluid">
    <div class="nav_main">
      <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="nav navbar-nav ml-auto under">
            <li class="nav-item active"> <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Casual Shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Athletic Shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Bridal Shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Comfort shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">New Releases</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Gift Cards</a> </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!--Navigation bar close-->
  
  
  <!--Section start-->
  
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
	
    				<thead>
						
							
						<tr>
							<th style="width:5%">S.No</th>
							<th style="width:10%; padding-left:55px;">Product</th>
							<th style="width:5%">Name</th>
							<th style="width:8%">Price</th>
							<th style="width:5%">Quantity</th>
							<th style="width:5%" class="text-center">Subtotal</th>
							<th style="width:1%" class="text-center">Action</th>
						</tr>
					
					</thead>
					<tbody>
						<?php
	$n=1;
	  $gtotal=0;
	   $_SESSION['gto']=$gtotal;
	   $disableCheckout = "";
	   $chtitle = "";

		$sessionId = "";
		if(isset($_SESSION['shopper']))
			$sessionId = md5($_SESSION['shopperId']);
		else
			$sessionId = md5($ip);

		$query="select ct.pId AS pId, ct.qty AS quantity, p.pname AS name, p.img AS image, p.oprice AS price 
		from cart AS ct left join addpro AS p ON (ct.pId = p.id) 
		where ct.sessionId ='". $sessionId. "' AND ct.ordered = 0 ";

		$res=mysqli_query($con,$query);
		// $res = mysqli_fetch_array($res);
	 //   	var_dump($res);
	 //   	die();
	   if(cartExists() > 0)
	   {
			  while($row=mysqli_fetch_array($res) ){
			  	if($n==4)
			  		break;


		   // foreach($_SESSION['cart'] as $Id=>$value){
			  $dis=mysqli_query($con,"select * from `addpro` where id='$Id'");
			   // $row=mysqli_fetch_assoc($dis);
			   $gtotal+=$row['price']*$row['quantity'];
			   $_SESSION['sn']=$n;
			   $_SESSION['gto']=$gtotal;
	  
	?>
						<tr>
							<td style="width: 5%;">
							<?php echo $n++;?>
							</td>
							<td>
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="admin/Upload/<?php echo $row['image'];?>" alt="khini_image" width="150px"  class="img-responsive"/></div>
									
								</div>
							</td>
							
							<td >Shoes</td>
							<td ><?php echo $row['price'];?></td>
							<td >
							<div class="quan"><?php echo $row['quantity'];?></div>
							</td>
							<td class="text-center"><?php echo $row['price']*$row['quantity'];?></td>
							<td class="actions">
								<a href="cart.php?id=<?php echo $row['pId'];?>&action=remove" class="sub"><button class="btn btn-info btn-sm">-</button></a>
								<a href="cart.php?id=<?php echo $row['pId']?>&action=add" class="sup"><button class="btn btn-danger btn-sm">+</button>	</a>							
							</td>
						</tr>
							<?php
   } 
   }else{
   	$disableCheckout = " pointer-events: none; ";
   	$chtitle = " title='Please Add Atleast One Item To Checkout' ";
	 	echo "
	 		<tr>
	 			<td colspan = '7' class='text-center'>Your Cart is Empty</td>
	 		</tr>
	 		";

	 }
	?>
					</tbody>
					<tfoot>
						
						<tr>
							<td colspan="2"><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2"><a href="cart.php?id=<?php echo $Id?>&action=clear" class="btn btn-danger"><i class="fa fa-window-close" style="margin-right: 10px;"></i> Clear Cart</a></td>
							<td class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong> Total &nbsp; <?php echo $gtotal;?></strong></td>
							<td <?= $chtitle; ?> ><a href="check.php" class="btn btn-success btn-block" style="width: 101%;<?= $disableCheckout; ?>  " >Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
	<?php
	   }
	 
?>

</div>
  
  <!--Section close--> 
  
  <!--FOOTER START-->
  <footer>
    <div class="container-fluid">
      <div class="row footer_top">
        <div class="col-md-1 col-lg-1"></div>
        <div class="col-md-2 col-lg-2"> <i class="fa fa-circle icon_footer"></i>Careers <br>
          <i class="fa fa-circle icon_footer"></i> Investor Relations </div>
        <div class="col-md-3 col-lg-3"> <i class="fa fa-circle icon_footer"></i> Nordstrom Rack <br>
          <i class="fa fa-circle icon_footer"></i> Store Location &amp; Events </div>
        <div class="col-md-3 col-lg-3"> <i class="fa fa-circle icon_footer"></i> Check Order Status <br>
          <i class="fa fa-circle icon_footer"></i> Returns &amp; Exchanges </div>
        <div class="col-md-2 col-lg-2"> <i class="fa fa-circle icon_footer"></i> Shipping Options &amp; Chargs <br>
          <i class="fa fa-circle icon_footer"></i> Product Recall </div>
        <div class="col-md-1 col-lg-1"></div>
      </div>
      <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-8 col-lg-8 footer_col_left">
          <ul>
            <li><a href="">Home &nbsp;&nbsp; |</a></li>
            <li><a href="">Casual Shoes &nbsp;&nbsp; |</a></li>
            <li><a href="">Athletic Shoes &nbsp;&nbsp; |</a></li>
            <li><a href="">Bridal Shoes &nbsp;&nbsp; |</a></li>
            <li><a href="">Comfort shoes &nbsp;&nbsp; |</a></li>
            <li><a href="">New Releases &nbsp;&nbsp; |</a></li>
            <li><a href="">Grift Cards &nbsp;&nbsp; |</a></li>
            <li><a href="">Contact Us &nbsp;&nbsp; |</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-lg-4">
          <div class="footer_text"> Copyright &copy; 2009 buytempletes net All Rights Reserves </div>
        </div>
      </div>
    </div>
  </footer>
  <!--FOOTER CLOSE--> 
  
	
	
</div>
</body>
</html>
