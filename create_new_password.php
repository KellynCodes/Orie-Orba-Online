
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enugu Tech Ecommerce Website</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/orie orba 5-01.jpg" type="image/x-icon">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/login.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="product_not_found">
      <p>We don't have this product you searched</p>
    </div>
    <!-- window preloader -->
    <div class="preloader_container">
        <p>ORIE OBA ONLINE</p>
       <div class="preloader"></div>
       <h4>Connecting</h4>
    </div>
      <!-- header section -->
    <header>
        <nav>
            <div class="top_navbar">
                <div class="logo">
                    <a href="index.php">
                        <img src="./assets/Orie Orba-001-01.jpg" alt="">
                    </a>
                </div>
                 
               <div class="center_bar">
                <div class="navbar_hover">
                    <span class="bar2"></span>
                    <span class="bar2"></span>
                    <span class="bar2"></span>
                </div>
                <div class="search_bar">
                    <div class="search_bar_container">
                   <input type="search" placeholder="Search Products" class="search_nav" name="search_bar">
                    </div>
                    <button type="submit" class="search_btn">Search</button>
                </div>
               </div>
               <div class="right_bar">
                <ul class="navigation_links">
                    <li id="account">ACCOUNT <i id="caret_down" class="bi bi-caret-down-fill"></i></li>
                    <li class="help">HELP <i id="caret_down" class="bi bi-caret-down-fill"></i></li>
                    <a href="cart.php" class="cart"><i class="bi bi-cart-plus-fill"></i> CART</a>

                </ul>
                <div class="navbar_toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
            </div>
            <div id="account_container" class="my_account">
                <ul>
                  <a href="login.php">Login</a>
                  <a href="register.php">SignUp</a>
                </ul>
            </div>

            <div class="help_center">
                <ul class="help_list">
                    <a href="#">How To Place Order</a>
                    <a href="chat.php">Live ChaT</a>
                </ul>
            </div>
        </nav>
    </header>
      <!--End of header section -->




    <main>
              <!-- TOP SALES -->
            <section>

                <?php 
                include 'reset_password.php';

    $selectorToken = $_GET['selectorToken'];
    $validatorToken = $_GET['validatorToken'];

    if(empty($selector) || empty($validatorToken)){
        $msg = "We could not validate Your request";
        $msgtype = "danger";
    }else{
        if(ctype_xdigit($selectorToken) !== false && ctype_xdigit($validatorToken) !== false):

            ?>

            
<div class=" container" style="margin-top: 5rem;">

<!-- first side of the tables -->
<div class="left_container">
    <p>
       Enter your new password to reset your password.

    </hp>

    <form method="POST">

        <div class="alert alert-<?php echo $msgtype ?> text-center"><?php echo $msg ?></div>
        
    <div class="form-group">

        <input type="hidden" name="selectorToken" id="" value="<?php echo $selectorToken ?>">
        <input type="hidden" name="validatorToken" id="" value="<?php echo $validatorToken ?>">


    <i class="bi bi-key-fill"></i>
        <input  type="password" name="new_password" value="<?php echo $first_password ?>" placeholder="New Password" required="">
    <i class="bi bi-key-fill"></i>
        <input  type="password" name="repeated_password" value="<?php echo $second_password ?>" placeholder="Repeat Password" required="">
    </div>
 

  <div class="btn_container">
     <button type="submit" name="reset_password">Reset Password</button> 

</div>

</form>


</div>

<!-- end of side of the table -->
</div>

            <?php
        endif;
    }

                ?>



                    
            </section>
    </main>
    <script src="js_files/main.js"></script>
  <!-- FOOTER SECTION -->
  <footer>
    <div class="main_footer">
     <div class="links">
         <h5>Your can connect with us in our social media community</h5>
         <ul>
             <a href="https://fb.com/EnuguTechHub"><i class="bi bi-facebook"></i></a>
            <a href="https://fb.com/EnuguTechHub"><i class="bi bi-twitter"></i></a>
            <a href="https://fb.com/EnuguTechHub"><i class="bi bi-whatsapp"></i></a>
            <a href="https://fb.com/EnuguTechHub"><i class="bi bi-linkedin"></i></a>
            <a href="https://fb.com/EnuguTechHub"><i class="bi bi-youtube"></i></a>
         
         </ul>
     </div>

     <div class="product_brands">
         <ul>
            <a href="#">Electronics</a>
            <a href="#">Food Stuffs</a>
            <a href="#">Clothens   </a>
            <a href="#">Timber</a>
            <a href="#">Books</a>
         </ul>
     </div>

     <div class="our_goal">
         <h3>Our Goal</h3>
         <p>
             Our Goal is to provice online services to vast number of goods sold
              at orie oba market with an affordabe and price. We do offer unlimited services to 
              vast number of goods sold at orie oba world bank market.
         </p>
     </div>

     <div class="newsletter">
         <h5>Subcribe To our newsletter to receive email on new product and orther related news about out site</h5>
         <form action="">
             <input type="email" placeholder="Your Email">
             <button type="submit">SignUp</button>
         </form>
     </div>
     <div class="team">
         <h3>Builders</h3>
         
         <ul>
             <li>KellynCode</li>
             <li>Emma Greatest</li>
             <li>Emmanuel Onyekachi</li>
             <li>Alpha King</li>
             <li>Ike Paul</li>
         </ul>
     </div>
    </div>

    <div class="copyright">
     <div class="allright">
         <h4 class="childrens">Enugu Tech Hub Ecommerce Website</h4>
         <h5 class="childrens">Allright reserved 2022 &copy; copyright</h5>
         <p class="childrens">Designed by Enugu Tech Hub student 2022 section</p>
     </div>
    </div>
 </footer>
 <!--END OF FOOTER SECTION -->
 <script src="js_files/main.js"></script>
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>