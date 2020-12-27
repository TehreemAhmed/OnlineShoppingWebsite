<?php
	include('admin/conf.php');

$a = ' Rs: ';
	$userp=$_SESSION['shopper'];
	$query="select * from `shopper` where fname='$userp'";
	$dis=mysqli_query($con,$query) or die (mysqli_error());
	$row=mysqli_fetch_array($dis);
    $_SESSION['semail']=$row[4];

$query1="select * from `addpro` where cate='m_shoes'";
			  $dis1=mysqli_query($con,$query1) or die (mysqli_error());
				$row1=mysqli_fetch_array($dis1);
					$id=$row[0];

/* Order Placing */
if(isset($_POST['checkoutSubmit']))
{
	$ip = $_SERVER['REMOTE_ADDR'];
	$sessionId="";
	if(isset($_SESSION['shopper']))
		$sessionId = md5($_SESSION['shopperId']);
	else
		$sessionId = md5($ip);

	$email=$_POST['email'];
	$firstname=$_POST['firstname'];
	$nameOnCard=$_POST['nameOnCard'];
	$cardNumber=$_POST['cardNumber'];
	$expMonth=$_POST['expMonth'];
	$expYear=$_POST['expYear'];
	$cvv=$_POST['cvv'];
	$total=$_POST['total'];

	$ordQuery="INSERT INTO `order` (sessionId, email, firstname, nameOnCard, cardNumber, expMonth, expYear, cvv, total) VALUES 
	('".$sessionId."', '".$email."', '".$firstname."', '".$nameOnCard."', '".$cardNumber."', '".$expMonth."', '".$expYear."', '".$cvv."', '".$total."')";
	$run=mysqli_query($con,$ordQuery);

	$getCartQuery = " SELECT * FROM cart where sessionId = '".$sessionId."' AND ordered = 0 ";
	$ress=mysqli_query($con,$getCartQuery);

	$lastIdQuery = " SELECT MAX(id) as lastId FROM `order`";
	$lastId=mysqli_query($con,$lastIdQuery);
	$lastId=mysqli_fetch_array($lastId);
	$lastId= $lastId[0];
	

	while($row=mysqli_fetch_array($ress))
	{
		$pNameQuery = " SELECT pname as name FROM `addpro` WHERE id = '".$row['pId']."' ";
		$pName=mysqli_query($con,$pNameQuery);
		$pName=mysqli_fetch_array($pName);
		$pName= $pName[0];

		$ordProdQuery="INSERT INTO `order_product` (order_id, p_id, p_name, p_qty)
		VALUES 
		('".$lastId."', '".$row['pId']."', '".$pName."',
		 '".$row['qty']."')";
		$run=mysqli_query($con,$ordProdQuery);
	}


	$updatecartQuery = "UPDATE cart set ordered = 1 where sessionId = '".$sessionId."'  ";
	$res=mysqli_query($con,$updatecartQuery);




	header("location: index.php");
}

/* Order Placing */
?>
<!DOCTYPE html>
<html>
<head>
<title>Payment Form Widget Flat Responsive Widget Template :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Payment Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="admin/css/check.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- <script type="text/javascript" src="admin/js/jquery-3.3.1.slim.min.js"> --></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="main">
		<h1>Payment Form Widget</h1>
		<div class="content">
			
			<script src="admin/js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion           
								width: 'auto', //auto or any width like 600px
								fit: true   // 100% fit in a container
							});
						});
						
					</script>
						<div class="sap_tabs">
							<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
								<div class="pay-tabs">
									<h2>Select Payment Method</h2>
									  <ul class="resp-tabs-list text-center">
										  <li class="resp-tab-item text-center" aria-controls="tab_item-0" role="tab"><span><label class="pic1"></label>Credit Card</span></li>
										  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab" style="display: none;"><span><label class="pic3"></label>Net Banking</span></li>
										  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab" style="display: none;"><span><label class="pic4"></label>PayPal</span></li> 
										  <li class="resp-tab-item" aria-controls="tab_item-3" role="tab" style="display: none;"><span><label class="pic2"></label>Debit Card</span></li>
										  <div class="clear"></div>
									  </ul>	
								</div>
								<div class="resp-tabs-container">
									
									
									
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="payment-info">
											<h3>Personal Information</h3>
											<form action="#" method="POST">
												<div class="tab-for">				
													<h5>EMAIL ADDRESS</h5>
														<input type="text" name="email" value="<?php 
																				  if(isset($_SESSION['shopper'])){
																					  if($_SESSION['semail']){
																						  
																				  echo $_SESSION['semail'];}
																				  }
																				  else{
																					  header('location: admin/shopper_login.php');
																				  }?>	">
													<h5>FIRST NAME</h5>													
														<input type="text" name="firstname" value="<?php 
																				  if(isset($_SESSION['shopper'])){
																				  echo $_SESSION['shopper'];
																				  }
																				  else{
																					  header('location: admin/shopper_login.php');
																				  }?>	">
												</div>			
											<h3 class="pay-title">Credit Card Info</h3>
											
												
												 <input id="token" name="token" type="hidden" value="">
												
												<div class="tab-for">				
													<h5>NAME ON CARD</h5>
														<input type="text" name="nameOnCard" value="" >
													<h5>CARD NUMBER</h5>													
														<input class="pay-logo" name="cardNumber" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" id="ccNo" type="text" size="20" value="" autocomplete="off" required>
												</div>	
												<div class="transaction">
													<div class="tab-form-left user-form">
														<h5>EXPIRATION</h5>
															<ul>
																<li>
																	<input type="number" class="text_box" name="expMonth" type="text" value="6" min="1" size="2" id="expMonth" required />	
																</li>
																<li>
																	<input type="number" class="text_box" name="expYear" type="text" value="1988" min="1" size="2" id="expYear" required />	
																</li>
																
															</ul>
													</div>
													<div class="tab-form-right user-form-rt">
														<h5>CVV NUMBER</h5>													
														<input type="text" id="cvv" name="cvv" size="4" type="text" value="" autocomplete="off" required  value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
													</div>
													<div class="clear"></div>
												</div><a href="cart.php?id=<?php echo $id?>&action;">
												<input type="button" style="width:auto; padding:10px 8px 10px 0px; opacity: 0;
																			    margin-bottom: 12px;" >
												<i class="fa fa-sign-out" style="transform: rotate(180deg)"></i> &nbsp;  Cancel</a>
												
												
												<a href="payment.php" name="amount"  style="width:auto; padding:10px 8px; float: right; transform: skewY(20deg;)" > Payment &nbsp; <?php
																			 echo $a; 
																			echo $_SESSION['gto'];?> </a>

												<input type="hidden" name="total" value="<?= $_SESSION['gto']; ?>">
												<input type="submit" name="checkoutSubmit" value="OrderNow">
										
											</form>
											

        <script>
            // Called when token created successfully.
            var successCallback = function(data) {
                var myForm = document.getElementById('myCCForm');

                // Set the token as the value for the token input
                myForm.token.value = data.response.token.token;

                // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
                myForm.submit();
            };

            // Called when token creation fails.
            var errorCallback = function(data) {
                if (data.errorCode === 200) {
                    tokenRequest();
                } else {
                    alert(data.errorMsg);
                }
            };

            var tokenRequest = function() {
                // Setup token request arguments
                var args = {
                    sellerId: "sandbox-seller-id",
                    publishableKey: "sandbox-publishable-key",
                    ccNo: $("#ccNo").val(),
                    cvv: $("#cvv").val(),
                    expMonth: $("#expMonth").val(),
                    expYear: $("#expYear").val()
                };

                // Make the token request
                TCO.requestToken(successCallback, errorCallback, args);
            };

            $(function() {
                // Pull in the public encryption key for our environment
                TCO.loadPubKey('sandbox');

                $("#myCCForm").submit(function(e) {
                    // Call our token request function
                    tokenRequest();

                    // Prevent form from submitting
                    return false;
                });
            });
        </script>
											<div class="single-bottom">
													<ul>
														<li>
															<input type="checkbox"  id="brand" value="">
															<label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
														</li>
													</ul>
											</div>
										</div>
									</div>
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="payment-info">
											<h3>Net Banking</h3>
											<div class="radio-btns">
												<div class="swit">								
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Andhra Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Allahabad Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bank of Baroda</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Canara Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>IDBI Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Icici Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Overseas Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Punjab National Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>South Indian Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>State Bank Of India</label> </div></div>		
												</div>
												<div class="swit">								
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>City Union Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>HDFC Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>IndusInd Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Syndicate Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Deutsche Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Corporation Bank</label> </div></div>
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>UCO Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Federal Bank</label> </div></div>	
													<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>ING Vysya Bank</label> </div></div>	
												</div>
												<div class="clear"></div>
											</div>
											<a href="#">Continue</a>
										</div>
									</div>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
										<div class="payment-info">
											<h3>PayPal</h3>
											<h4>Already Have A PayPal Account?</h4>
											<div class="login-tab">
												<div class="user-login">
													<h2>Login</h2>
													
													<form>
														<input type="text" value="name@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name@email.com';}" required="">
														<input type="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}" required="">
															<div class="user-grids">
																<div class="user-left">
																	<div class="single-bottom">
																			<ul>
																				<li>
																					<input type="checkbox"  id="brand1" value="">
																					<label for="brand1"><span></span>Remember me?</label>
																				</li>
																			</ul>
																	</div>
																</div>
																<div class="user-right">
																	<input type="submit" value="LOGIN">
																</div>
																<div class="clear"></div>
															</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">	
										<div class="payment-info">
											
											<h3 class="pay-title">Dedit Card Info</h3>
											<form>
												<div class="tab-for">				
													<h5>NAME ON CARD</h5>
														<input type="text" value="">
													<h5>CARD NUMBER</h5>													
														<input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
												</div>	
												<div class="transaction">
													<div class="tab-form-left user-form">
														<h5>EXPIRATION</h5>
															<ul>
																<li>
																	<input type="number" class="text_box" type="text" value="6" min="1" />	
																</li>
																<li>
																	<input type="number" class="text_box" type="text" value="1988" min="1" />	
																</li>
																
															</ul>
													</div>
													<div class="tab-form-right user-form-rt">
														<h5>CVV NUMBER</h5>													
														<input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
													</div>
													<div class="clear"></div>
												</div>
												<input type="submit" value="Payment">
											</form>
											<div class="single-bottom">
													<ul>
														<li>
															<input type="checkbox"  id="brand" value="">
															<label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
														</li>
													</ul>
											</div>
										</div>	
									</div>
								</div>	
							</div>
						</div>	

		</div>
		
		
		<p class="footer">Copyright © 2019 Payment Form Widget. All Rights Reserved | Template by <a href="index.php" target="_blank">Multi Solution</a></p>
	</div>
	
	
</body>
</html>