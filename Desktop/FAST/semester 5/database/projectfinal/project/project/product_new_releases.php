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
    $( ".pFilter1" ).click(function() {
      $(".priceInput").val("pf1");
      $("#prodFilters").trigger( "click" );
    });
    $( ".pFilter2" ).click(function() {
      $(".priceInput").val("pf2");
      $("#prodFilters").trigger( "click" );
    });
    $( ".pFilter3" ).click(function() {
      $(".priceInput").val("pf3");
      $("#prodFilters").trigger( "click" );
    });
    $( ".pFilter4" ).click(function() {
      $(".priceInput").val("pf4");
      $("#prodFilters").trigger( "click" );
    });


  });
</script>

<?php 
  include('admin/conf.php');
  $query="select * from `addpro` where cate='new_releases'";
  $catFil = " cate= 'new_releases' ";
  $catVal = false;
  if(isset($_POST['prodFilters']))
  {
    $query="select * from `addpro` where cate='".$_POST['cate']."' ";
    $catFil = " cate= '".$_POST['cate']."' AND color= '".$_POST['color']."' ";
    $catVal = true;
  ?>
  <script>
    var catVal = "<?php echo $_POST['cate']; ?>"
    var colVal = "<?php echo $_POST['color']; ?>"
  $(document).ready(function(){
    $('.cateInput').val(catVal);
    $('.colorInput').val(colVal);
  });
  </script>
  <?php
  }

  $dis=mysqli_query($con,$query) or die (mysqli_error());
  $row=mysqli_fetch_array($dis);
  $id=$row[0];
  $_SESSION['zero']='0';

  $page ="";
  if(isset($_GET['page']))
   $page=$_GET['page'];

  if($page==0 || $page==1)
    $page1=0;
  else
    $page1=($page*5)-5;

?>

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
            <li class="nav-item active"> <a class="nav-link home_box" href="http://localhost/project">Home <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/project/product_casual.php">Casual Shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/project/product_athletic.php">Athletic Shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/project/product_bridal.php">Bridal Shoes</a> </li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/project/product_comfort.php">Comfort shoes</a> </li>
            <li class="nav-item nav-item-active"> <a class="nav-link" href="http://localhost/project/product_new_releases.php">New Releases</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Gift Cards</a> </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!--Navigation bar close-->
  <div class="container-fluid">
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
  
  <!--Banner start-->
  <div class="banner">
    <div class="container-fluid ">
      <div class="row">
        <div class="col-md-6 col-lg-3 cpro">
          <div class="small1">COMPARE</div>
          <div class="larg1"> PRODUCTS </div>
          <br>
          <span class="dummy_text">Aenean commodo ligula eget dolor.</span> </div>
        <div class="col-md-6 col-lg-3 cpro2">
          <div class="row">
            <div class="col-sm-2"><a href="cart.php?id=<?php echo $id?>&action" style="color:#efff00d4;" class="my_"> <img src="admin/img/icon.png" alt="icon" height="52px" width="52px" style="margin-top:5px;"/> </div>
            <div class="col-sm-8">
              <div class="small1">MY</div>
              <div class="larg1"> CART <?php    if(isset($_SESSION['sn']) && ($_SESSION['gto']>=1)){
                         $_SESSION['gto']>=1;
                         echo $_SESSION['sn'];
                       }else{
                         echo $_SESSION['zero'];
                       };
          ?></a></div>
              <br>
              <span class="dummy_text">You have no items in your shopping cart</span> </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 cpro3">
          <div class="small2">NEWSLETTER</div>
          <div class="larg2"> Sign up for our newsletter </div>
          <br>
          <span class="dummy_text1">
          <input type="text" class="type_text">
          <input type="submit" value="Subscribe" class="sub_btn">
          </span> </div>
        <div class="col-md-6 col-lg-3 cpro4">
          <div class="full1">END OF MONTH DEALS</div>
          <div class="larg3"> SALE <span class="upto">UPTO 50%</span> </div>
          <br>
          <span class="dummy_text2"><i class="fa fa-angle-right angle_i"></i>LEARN MORE</span> </div>
      </div>
    </div>
  </div>
  <!--Banner close--> 
  
  <!--Section start-->
  
  <section>
    <div class="container-fluid">
      <div class="row"> 
        
        <!--SECTION LEFT START-->
        
        <div class="col-lg-3 col-md-12 col-xl-3">
          <div class="section_left">
            <div class="row1">
              <div class="row">
                <div class="col-sm-12"> <i class="fa fa-caret-square-right icon_caret"></i>
                  <h5 class="cum">Community Poll</h5>
                  <div class="dropdown-divider"></div>
                </div>
              </div>
            </div>
            <div class="row2">
              <div class="row">
                <div class="col-sm-12">
                  <h5>What is the main reasion for you to purchase online?</h5>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> Lower price</h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> Bigger choice</h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> Payments security </h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i>30-day Money Back Guarantee</h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> More comuniart shipping and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; delivery</h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> Other </h6>
                </div>
              </div>
            </div>
        
         <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                </div>
              </div>
            </div>
        
        <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                </div>
              </div>
            </div>
        
      
        
        
            <div class="col-lg-6 col-md-6"> </div>
            <div class="col-lg-3 col-md-3"> </div>
          </div>
      
          <div class="section_left1">
            <div class="row1">
              <div class="row">
                <div class="col-sm-12"> <i class="fa fa-caret-square-right icon_caret"></i>
                  <h5 class="cum">Popular Tags</h5>
                  <div class="dropdown-divider"></div>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> <u> advantage </u> &nbsp; <u> community </u> </h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> <u> compaines </u> &nbsp; <u> even takes </u> </h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> <u> falsification </u> &nbsp; <u> from </u> </h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> <u> iS </u> &nbsp; <u> measure </u> &nbsp; <u> negative </u> </h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> <u> one </u> &nbsp; <u> process </u> &nbsp; <u> reliability </u> </h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> <u> Respectable </u> </h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> <u> some </u> &nbsp; <u> sometime </u> &nbsp; <u> sometimes </u> </h6>
                </div>
              </div>
            </div>
            <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                  <h6> <i class="fa fa-circle icon_circle"></i> <u>sutter </u> &nbsp; <u> wavn </u> </h6>
                </div>
              </div>
            </div>
        
        <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                </div>
              </div>
            </div>
        
        <div class="row3">
              <div class="row">
                <div class="col-sm-12">
                </div>
              </div>
            </div>
        
          </div>
        </div>
        
        <!--SECTION LEFT CLOSE--> 
        
        <!--SECTION CENTER START -->
        <div class="col-lg-6 col-md-6 col-xl-6  section_center">
          <div class="row headc">
            <div class="col-sm-12 headd">
              <h4>POPULAR PRODUCTS</h4>
            </div>
          </div>
          <div class="row center_inner center_sec">
          <!-- zeeshan shop cart code -->
        <?php 
            
        $query="select * from `addpro` where $catFil  limit $page1,4";
        $dis=mysqli_query($con,$query) or die (mysqli_error());
        while($row=mysqli_fetch_array($dis)){
          $id=$row[0];
          $percentOff = round(($row[6] - $row[5]) / ($row[6] / 100))."% Off";
          
        ?>
            <div class="col-sm-10 center_col col-xl-5 col-md-10 col-lg-10">
              <div class="photo"> <a href="http://localhost/project/product.php?id=<?php echo $id?>" target="_blank"><img src="admin/upload/<?php echo $row[2];?>" alt="pro_shoes" class="card-img"/> </a>
                <input type="file" name="img" style="visibility: hidden;"></div>
              <div class="pname hvr-sweep-to-right"><?php echo $row[3];?><input type="text" name="pname" style="visibility: hidden;"> </div>
              <div class="row" style="padding:5px 0px; 0px 0px">
                <div class="col-1"></div>
                <div class="col-5 " style="padding: 0 0px 0px 6px;">
                  <p class="price hvr-float-shadow" style="    margin: 0px 0px -27px 0px;"><del>Rs.<?php echo $row[5];?></del>
                    <span style="font-size: 12px; color: #4c8909;"><?= $percentOff; ?></span><input type="text" name="nprice" style="visibility: hidden;"></p>
                  <h5 class="price hvr-float-shadow">Rs.<?php echo $row[6];?><input type="text" name="nprice" style="visibility: hidden;"></h5>
                </div>
                <div class="col-5">
        <!-- zeeshan shop cart code -->
                
          
          <button type="button" class="btn btn-primary add hvr-bounce-to-right" data-toggle="modal" data-target=""> 
            <a href="cart.php?id=<?php echo $id?>&action=add" >Add to cart</a></button>
          
          <!-- Extra large modal -->

<div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
     <?php

   if(isset($_GET['id'])){
       $Id=$_GET['id'];
       $Action=$_GET['action'];
       
       switch($Action){
               
           case "add":
               if(isset($_SESSION['cart'])){
                   $_SESSION['cart'][$Id]++;
               }else{
                   $_SESSION['cart'][$Id]=1;
               }break;
               
               case "remove":
                $_SESSION['cart'][$Id]--;
               if($_SESSION['cart'][$Id]==0){
                   unset($_SESSION['cart'][$Id]);
               }break;
               
               case "clear":
               unset($_SESSION['cart']);
          unset($_SESSION['sn']);
         $_SESSION['sn'] = '0';
             
         
               
        
               echo"
               <script>
               window.location='index.php';
               </script>";
         
               
       }


?>

  
  <!--Section start-->
  
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
     foreach($_SESSION['cart'] as $Id=>$value){
      $dis=mysqli_query($con,"select * from `addpro` where id='$Id'");
       $row=mysqli_fetch_assoc($dis);
       $gtotal+=$row['nprice']*$value;
       $_SESSION['sn']=$n;
       $_SESSION['gto']=$gtotal;
    
  ?>
            <tr>
              <td style="width: 5%;">
              <?php echo $n++;?>
              </td>
              <td>
                <div class="row">
                  <div class="col-sm-2 hidden-xs"><img src="admin/Upload/<?php echo $row['img'];?>" alt="khini_image" width="150px"  class="img-responsive"/></div>
                  
                </div>
              </td>
              
              <td >Shoes</td>
              <td ><?php echo $row['nprice'];?></td>
              <td >
              <div class="quan"><?php echo $value;?></div>
              </td>
              <td class="text-center"><?php echo $row['nprice']*$value;?></td>
              <td class="actions">
                <a href="cart.php?id=<?php echo $row['id']?>&action=remove" class="sub"><button class="btn btn-info btn-sm">-</button></a>
                <a href="cart.php?id=<?php echo $row['id']?>&action=add" class="sup"><button class="btn btn-danger btn-sm">+</button> </a>              
              </td>
            </tr>
              <?php
   } 
  ?>
          </tbody>
          <tfoot>
            
            <tr>
              <td colspan="2"><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
              <td colspan="2"><a href="cart.php?id=<?php echo $Id?>&action=clear" class="btn btn-danger"><i class="fa fa-window-close" style="margin-right: 10px;"></i> Clear Cart</a></td>
              <td class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong> Total &nbsp; <?php echo $gtotal;?></strong></td>
              <td><a href="check.php?id=<?php echo $Id?>&action=clear" class="btn btn-success btn-block" style="width: 101%;">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
          </tfoot>
        </table>
  <?php
   }
?>
  
  <!--Section close--> 
  
  
  

    </div>
  </div>
</div>


          <!-- Extra large modal close-->
          
          
          

          
                </div>
              </div>
            </div>
        
        <?php 
        };
        
        ?>
       
        
          </div>
      <div class="container-fluid"><div class="row"><div class="col-12" align="center" style="margin-bottom: 10px;">  
        <a href="index.php?page=1" class="pag">First</a>
        <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>" class="pag">Previous</a>
        
        
        <?php
        $query1="select * from `addpro`";
        $dis1=mysqli_query($con,$query1) or die(mysqli_error());
        $count=mysqli_num_rows($dis1);
        $b=$count/5;
        
        for($a=1; $a<=$b; $a++){
         ?>
        <a href="index.php?page=<?php echo $a;?>" class="pagm">
        <?php echo $a;?>
        </a>
        <?php
        }
        ?>
        <a href="<?php if($page >= $count){ echo '#'; } else { echo "?page=".($page + 1); }?>" class="pagn">Next</a>
        <a href="index.php?page=4" class="pag">Last</a>
        </div></div></div>
    
        </div>
        
        <!--SECTION CENTER CLOSE--> 
        
        <!--SECTION RIGHT START-->
        
        <div class="col-lg-3 col-md-6 col-xl-3 section_right">
         <!--  <div class="row sec_r">
            <div class="col-sm-12 col-md-12 col-lg-5">
              <h6>Your Language</h6>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7">
              <div class="box_l"> English <i class="fa fa-angle-down icon_l"></i> </div>
            </div>
          </div> -->
          <div class="row">
            <div class="col-12 right_cent">
              <div class="row">
                <div class="col-12">
                  <h6>Shop by</h6>
                </div>
              </div>

              
              <!-- /*  Code By Zeeshan */ -->
              <form action="#" method="POST">
                <div class="row row_shopop">
                  <div class="col-12" style="margin-bottom: 15px;">
                    <h6 class="catFilter">Category </h6>
                    <select class="form-control cateInput" name="cate">  
                      <option value="casual"> Casual Shoes</option>
                      <option value="athletic"> Athletic Shoes</option>
                      <option value="bridal"> Bridal Shoes</option>
                      <option value="comfort"> Comfort Shoes</option>
                      <option value="new_releases"> New Releases</option>
                    </select>
                  </div>
                  <div class="col-12" style="margin-bottom: 15px;">
                    <h6 class="catFilter">Color </h6>
                    <select class="form-control colorInput" name="color">  
                      <option value="white"> White</option>
                      <option value="black"> Black</option>
                      <option value="red"> Red</option>
                      <option value="blue"> Blue</option>
                      <option value="white_black"> White & Black</option>
                    </select>
                  <input type="submit" name="prodFilters" id="prodFilters" value="Filter" class="btn btn-primary" style="margin-top: 10px;">
                  </div>
                </div>


              <div class="row price1">
                <div class="col-12">
                  <h6>Price</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h6 class=" pFilter pFilter1 fa fa-arrow-right">&nbsp&nbsp&nbsp50 - 3000</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h6 class=" pFilter pFilter2 fa fa-arrow-right">&nbsp&nbsp&nbsp3000 - 6000</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h6 class=" pFilter pFilter3 fa fa-arrow-right">&nbsp&nbsp&nbsp6000 - 10000</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h6 class=" pFilter pFilter4 fa fa-arrow-right">&nbsp&nbsp&nbsp10000 - 20000</h6>
                </div>
              </div>
                <input type="hidden" name="pFilter" value="" class="btn btn-primary priceInput" >
              </form>
              <!-- /*  Code By Zeeshan */ -->



            </div>
          </div>
          <div class="row" style="margin-top: 16px;">
            <div class="col-sm-12 col-md-12 col-lg-12"> <img src="admin/img/Man shoes/shoes38.jpg" alt="offer shoes" class="card-img img-thumbnail img-fluid"/> </div>
          </div>
        </div>
        
        <!--SECTION RIGHT CLOSE--> 
        
      </div>
    </div>
  </section>
  
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
          <div class="footer_text"> Copyright &copy; 2009 buytempletes net All Rights Reserved </div>
        </div>
      </div>
    </div>
  </footer>
  <!--FOOTER CLOSE--> 
  
</div>
</body>
</html>