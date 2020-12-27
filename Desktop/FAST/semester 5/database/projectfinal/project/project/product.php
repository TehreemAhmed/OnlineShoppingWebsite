<?php include('admin/conf.php'); ?>
<html>
<head>
<meta charset="utf-8">
<title>Shoe Store</title>
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
		.my_:hover{
			text-decoration: none;
		}
		.pag:hover{
			color: #f8f9fa;
    text-decoration: none;
    border: 1px solid #17a2b8;
    background-color: #17a2b8;
    transition: 0.5s ease all;
		}
		.pagn:hover{
			color: #f8f9fa;
    text-decoration: none;
    border: 1px solid #17a2b8;
    background-color: #17a2b8;
    transition: 0.5s ease all;
		}
		.pagm:hover{
			color: #f8f9fa;
    text-decoration: none;
    border: 1px solid #17a2b8;
    background-color: #17a2b8;
    transition: 0.5s ease all;
		}
		
		.pag{
			    padding: 0px 5px;
    color: #2098d1;
    border: 1px solid rgba(0,123,255,.25);
			
    font-size: 11px;
		}
		
		.pagn{
			
    font-size: 11px;
			    padding: 0px 5px;
    color: #2098d1;
    border: 1px solid rgba(0,123,255,.25);
			margin-left: 3px;
			transform: skewX(180deg);
		}
		
		.pagm{
			padding: 0px 5px;
    color: #2098d1;
    border: 1px solid rgba(0,123,255,.25);
    margin: 0px 3px 0px 1px;
    font-size: 11px;
		}
	</style>
</head>

<script type="text/javascript">
  $(document).ready(function(){
    $( ".revDown" ).click(function() {
      $(".revDown").hide();
      $(".revUp").show();
      $(".formReview").show();
    });
    $( ".revUp" ).click(function() {
      $(".revDown").show();
      $(".revUp").hide();
      $(".formReview").hide();
    });

    $( ".s_1" ).click(function() {
      $("#rating").val('1');
    });
    
    $( ".s_2" ).click(function() {
      $("#rating").val('2');
    });
    
    $( ".s_3" ).click(function() {
      $("#rating").val('3');
    });
    
    $( ".s_4" ).click(function() {
      $("#rating").val('4');
    });
    
    $( ".s_5" ).click(function() {
      $("#rating").val('5');
    });

    /* MOUSEOVER ON RATING */

    $(".s_1").mouseover(function(){
      $( this).css({"color" :　"orange","cursor" : "pointer"});
    });

    $(".s_2").mouseover(function(){
      $( this).css({"color" :　"orange","cursor" : "pointer"}); $( ".s_1").css({"color" :　"orange","cursor" : "pointer"});
    });

    $(".s_3").mouseover(function(){
      $( this).css({"color" :　"orange","cursor" : "pointer"}); $( ".s_1,.s_2").css({"color" :　"orange","cursor" : "pointer"});
    });

    $(".s_4").mouseover(function(){
      $( this).css({"color" :　"orange","cursor" : "pointer"}); $( ".s_1,.s_2,.s_3").css({"color" :　"orange","cursor" : "pointer"});
    });

    $(".s_5").mouseover(function(){
      $( this).css({"color" :　"orange","cursor" : "pointer"}); $( ".s_1,.s_2,.s_3,.s_4").css({"color" :　"orange","cursor" : "pointer"});
    });


    /* MOUSEOUT ON RATING */
    
    $(".s_1").mouseout(function(){
      $( this).css({"color" :　"black","cursor" : "pointer"});
    });

    $(".s_2").mouseout(function(){
      $( this).css({"color" :　"black","cursor" : "pointer"}); $( ".s_1").css({"color" :　"black","cursor" : "pointer"});
    });

    $(".s_3").mouseout(function(){
      $( this).css({"color" :　"black","cursor" : "pointer"}); $( ".s_1,.s_2").css({"color" :　"black","cursor" : "pointer"});
    });

    $(".s_4").mouseout(function(){
      $( this).css({"color" :　"black","cursor" : "pointer"}); $( ".s_1,.s_2,.s_3").css({"color" :　"black","cursor" : "pointer"});
    });

    $(".s_5").mouseout(function(){
      $( this).css({"color" :　"black","cursor" : "pointer"}); $( ".s_1,.s_2,.s_3,.s_4").css({"color" :　"black","cursor" : "pointer"});
    });

    $("#submitrating").click(function(){
        event.preventDefault();

        var prodId = $("#prodId").val();
        var rating = $("#rating").val();
        var shopperId = $("#shopperId").val();
        var revDesc = $("#revDesc").val();


        $.ajax({
          type:'POST',
          data: {prodId:prodId, rating:rating, shopperId:shopperId, revDesc:revDesc},
          url:"ajax/update_rating.php", //php page URL where we post this data to save in database
          success: function(result){
            console.log(result);
            window.location.reload();
          }
        })
    });
    var rating = $("#rating").val();
    if(rating == 1);
    {
      $(".s_1").css({"color" :　"orange","cursor" : "pointer"});
    }


  });
</script>



<body>
<div class="container-fluid"> 
  <!--Header start-->
  <?php include("admin/header.php");?>
  <!--Header close-->
  <div class="container-fluid">
    <div class="nav_main">
      <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="nav navbar-nav ml-auto under">
            <li class="nav-item nav-item-active  active"> <a class="nav-link home_box" href="http://localhost/project">Home <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item "> <a class="nav-link" href="http://localhost/project/product_casual.php">Casual Shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/project/product_athletic.php">Athletic Shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/project/product_bridal.php">Bridal Shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/project/product_comfort.php">Comfort shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/project/product_new_releases.php">New Releases</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Gift Cards</a> </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!--Navigation bar close-->
  <div class="container-fluid" style="margin-bottom: 15px;">
    <div class="row">
      <div class="col-12 img_main"> <img src="admin/img/slider.png" alt="slider" class="card-img" width="100%"/>
        <div class=" row img_box">
          <h1 class=" col-12 img_text"> Elite serious </h1>
          <br>
          <h5 class=" col-12 text_hed"> NAM UT SCELERISQUE PURUS. </h5>
          <h6 class=" col-12 text_dummy"> Lorem Ipsum is simply dummy text of the printing <br>
            and typesetting industry. Lorem Ipsum has <br>
            been the industry's standard. </h6>
        </div>
      </div>
    </div>
  </div>
  <!--Slider close--> 
  <?php
    $usrId= $_SESSION['shopperId'];
    $queryDuplicate=" select COUNT(id) as totalCustRated from `rating` where usrId = '".$usrId."' and prodId ='". $_GET['id']. "' ";
    $result=mysqli_query($con,$queryDuplicate);
    $totCust=mysqli_fetch_array($result);
    $totalCustRated = $totCust[0];

    $query2="select COUNT(DISTINCT usrId) as totalCustRated from `rating` where usrId > 0 and prodId ='". $_GET['id']. "' ";
    $res=mysqli_query($con,$query2);
    $totCust=mysqli_fetch_array($res);
    $totrated = $totCust;

    $queryavrRating="select ROUND(AVG(rating), 0) AS avrRating from `rating` where usrId > 0 and prodId ='". $_GET['id']. "' ";
    $resAvRating=mysqli_query($con,$queryavrRating);
    $resAvRating = mysqli_fetch_array($resAvRating);
    $avrRating = $resAvRating[0];

    function getShopperData($id)
    {
      global $con;
      $query="select *  from `shopper` where id = '".$id."' and status > 0 ";
      $result=mysqli_query($con,$query);
      $result = mysqli_fetch_array($result);
      $getShopperData = $result;
      return $getShopperData;
    }

    $query="select * from `addpro` where id = '".$_GET['id']."' ";
    $dis=mysqli_query($con,$query) or die (mysqli_error());
    while($row=mysqli_fetch_array($dis)){
      $percentOff = round(($row[6] - $row[5]) / ($row[6] / 100))."% Off";
      $id=$row[0];


  ?>
  <section>
    <div class="row col-md-12" style="margin-bottom: 10px;">

        <!-- IMAGE -->
        <div class=" prod_prodImage col-md-6 text-center">
          <img src="admin/upload/<?php echo $row[2];?>" height="410px" >
        </div>

        <!-- CONTENT -->
        <div class="col-md-6">

          <div class="prod_title" ><h2><?php echo $row[3];?></h2></div>
          
          <div class="prod_desc">
            <ul class="list-group-flush">
              <li>Flexible</li>
              <li>Ease Of Use</li>
              <li>Comfort</li>
              <li>Soft</li>
            </ul>
          </div>
          <div class="prod_price" style="padding: 0px 0px 0px 6px;">
            <p class="p_price " style="margin: 0px 0px -6px 0px;"><del>Rs.<?php echo $row[5];?></del>
            <span style="font-size: 12px; color: #4c8909;"><?= $percentOff; ?></span><input type="text" name="nprice" style="visibility: hidden;"></p>
            <h5 class="p_price ">Rs.<?php echo $row[6];?><input type="text" name="nprice" style="visibility: hidden;"></h5>
          </div>

          <div class="prod_adc" style="padding: 0 0px 0px 6px;">
          <button type="button" class="btn btn-primary add " data-toggle="modal" data-target=""> 
          <a href="cart.php?id=<?php echo $id?>&action=add" >Add to cart</a></button>
          </div>
        </div>
    </div>

    <?php
      $r1 = "";
      $r2 = "";
      $r3 = "";
      $r4 = "";
      $r5 = "";
    if($avrRating == 1 )
      $r1 = " rated ";
    if($avrRating == 2 )
      $r2 = $r1 = " rated ";
    if($avrRating == 3 )
      $r3 = $r2 = $r1 = " rated ";
    if($avrRating == 4 )
      $r4 = $r3 = $r2 = $r1 = " rated ";
    if($avrRating == 5 )
      $r5 = $r4 = $r3 = $r2 = $r1 =" rated ";

    ?>
    <!-- RATING FORM -->
    <div class="row col-md-12 ">
      <h1 class="text-center col-md-12" style="margin-bottom: 10px;">Customer Review</h1>
      <div class="ratingProd text-center col-md-12" style="margin-bottom: 10px;">
        <span class="fa fa-star <?= $r1; ?> "></span>
        <span class="fa fa-star <?= $r2; ?>"></span>
        <span class="fa fa-star <?= $r3; ?>"></span>
        <span class="fa fa-star <?= $r4; ?>"></span>
        <span class="fa fa-star <?= $r5; ?>"></span>
        <span class="totrated"> (<?= $totrated[0]; ?>) </span>
      </div>
    </div>

    <hr>
      <i class="fa fa-chevron-down revDown" style="float: right;"></i>
      <i class="fa fa-chevron-up revUp" style="float: right; display: none;"></i>
    <br>

<?php 
  $disability = " disabled ";
if(isset($_SESSION['shopperId']) > 0) 
{
  if($totalCustRated > 0)
    $disability = " disabled ";
  else
    $disability = "";
}


?>

    <!-- FORM REVIEW -->
    <form action="#" method="POST" class="formReview" style="display: none;">
      <?php 
      if(isset($_SESSION['shopperId']) > 0) 
      {
        echo "<p class='text-center'>You have already reviewed this product</p>"; 
      }
      else
      {
        echo "<p class='text-center'>Please Login to drop review</p>
              <p class='text-center'> <a href='http://localhost/project/admin/shopper_login.php'> LOGIN HERE</a></p>"; 
      }
      ?>
      <div class="col-md-10 prod_rev_textarea"  style="margin-bottom: 10px;">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Add Review Description</span>
          </div>
          <textarea class="form-control" aria-label="With textarea" name="revDesc" id="revDesc" style="height: 140px;" <?= $disability;?> ></textarea>
        </div>
      </div>

        <div class="ratingProd text-center col-md-12" style="margin-bottom: 10px;">
          <span class="fa fa-star s_star s_1"></span>
          <span class="fa fa-star s_star s_2"></span>
          <span class="fa fa-star s_star s_3"></span>
          <span class="fa fa-star s_star s_4"></span>
          <span class="fa fa-star s_star s_5"></span>
        </div>

    <div class="col-md-12  text-center" style="margin-bottom: 10px;" <?= $disability;?>> 
      <input type="hidden" name="rating" id="rating" value="0">
      <input type="hidden" name="prodId" id="prodId" value="<?= $_GET['id']; ?>" <?= $disability;?>>
      <input type="hidden" name="shopperId" id="shopperId" value="<?= $_SESSION['shopperId']; ?>" <?= $disability;?>>
      <input type="submit" name="submit" id="submitrating" value="SUBMIT REVIEW"class="btn btn-primary btn-sm" <?= $disability;?> >
    </div>
    </form>

  </section>
  <?php } ?>

  <?php 
   

    $datarev="select * from `rating` where prodId = '".$_GET['id']."' ";
    $datarev=mysqli_query($con,$datarev) or die (mysqli_error());
  ?>
  <section class="reviews_written">

    <div class="col-md-12 text-center" style="text-align: justify; background: #fff7f7; padding: 10;">
    <?php
    while($row=mysqli_fetch_array($datarev)){
    $r1 = "";
    $r2 = "";
    $r3 = "";
    $r4 = "";
    $r5 = "";

    if($row['rating'] == 1 )
      $r1 = " rated ";
    if($row['rating'] == 2 )
      $r2 = $r1 = " rated ";
    if($row['rating'] == 3 )
      $r3 = $r2 = $r1 = " rated ";
    if($row['rating'] == 4 )
      $r4 = $r3 = $r2 = $r1 = " rated ";
    if($row['rating'] == 5 )
      $r5 = $r4 = $r3 = $r2 = $r1 =" rated ";

    $custName = getShopperData($row['usrId'])['fname'];
    $memberSince = " Member Since ".getShopperData($row['usrId'])['day']."-".getShopperData($row['usrId'])['month']." ".getShopperData($row['usrId'])['year'];
    ?>
      <div class="custName" style="margin-bottom: 10px;"><h2><?= $custName; ?> </h2></div>  
      <div class="custRev" ><p><?= $row['revDesc']; ?> </p></div>
      <div class="custMS" style="font-size: 12px;  margin-top:-15px;" ><p style="color: gray;"><?= $memberSince; ?> </p></div>
      <div class="ratingProd text-center col-md-12" style="margin-bottom: 15px; margin-top:-12px;">
        <span class="fa fa-star <?= $r1; ?> "></span>
        <span class="fa fa-star <?= $r2; ?>"></span>
        <span class="fa fa-star <?= $r3; ?>"></span>
        <span class="fa fa-star <?= $r4; ?>"></span>
        <span class="fa fa-star <?= $r5; ?>"></span>
      </div>

    <?php } ?>

    </div>
  </section>

  <!--FOOTER START-->
  <footer>
    <div class="container-fluid">
      <div class="row footer_top">
        <div class="col-md-1 col-lg-1"></div>
        <div class="col-md-2 col-lg-2"> <i class="fa fa-circle icon_footer"></i>Careers <br>
          <i class="fa fa-circle icon_footer"></i> Investor  </div>
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
          <div class="footer_text"> Copyright &copy; 2009 buytempletes net All Rights Reserved </div>
        </div>
      </div>
    </div>
  </footer>
  <!--FOOTER CLOSE--> 
  
</div>
</body>
</html>