 <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <div class="logo">
            <div class="shoe">Sho<span style="font-size: 22px;">&euro;</span></div>
            <div class="store">Stor<span style="font-size: 22px;">&euro;</span></div>
            <p class="det"> The best shoe store online </p>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="row">
            <div class="col-md-12">
              <p class="our">Welcome to our online store!</p>
            </div>
          </div>
          <div class="top">
            <ul>
              <li class="acc"><a href="" class="hvr hvr-underline-from-center">My Account</a> &nbsp; &nbsp;|</li>
              <li class="acc1"><a href="" class="hvr hvr-underline-from-center">My Wishlist</a> &nbsp; &nbsp;|</li>
               <li class="acc1 check_b"><a href="cart.php?id=<?php echo $id?>&action;" class="hvr hvr-underline-from-center">My Cart </a> 
				  
				  <div class="check_v"><?php 
										   if(isset($_SESSION['sn']) && ($_SESSION['gto']>=1)){
											   $_SESSION['gto']>=1;
											   echo $_SESSION['sn'];
										   }elseif(isset($_SESSION['zero'])){
											   echo $_SESSION['zero'];
										   }
			 ?></div>
				  
				   &nbsp; &nbsp;&nbsp; &nbsp;|</li>
              <li class="acc1"><a href="check.php" class="hvr hvr-underline-from-center">Checkout</a> &nbsp; &nbsp; |</li>
              <?php if(!empty($_SESSION['shopper']))
              {?>
                <li class="acc1"><a href="admin/shopper_logout.php" class="hvr hvr-underline-from-center">Logout</a></li>
              <?php }else{ ?>
                <li class="acc1"><a href="admin/shopper_login.php" class="hvr hvr-underline-from-center">Login</a></li>
              <?php } ?>
            </ul>
          </div>
          <div class="box_b">
            <div class="cur"> Currency </div>
            <div class="sel">
              <div class="op1">US Dollar - USD <i class="fa fa-caret-down caret_icon"></i></div>
              <div class="op2">Pakistani Rupee</div>
              <div class="op3">European Euro</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>