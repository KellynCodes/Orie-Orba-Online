<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enugu Tech Ecommerce Website</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/logo.jpeg" type="image/x-icon">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/product_details.css">
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
                        <img src="./assets/logo.jpeg" alt="">
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
                    <a href="cart.php" class="cart"><i class="bi bi-cart-plus-fill"></i> CART</a>

                <?php
                include 'conn.php';
          
                $database = "SELECT * FROM cart WHERE user_id = '$user_id'";
                $db_querry = mysqli_query($conn,$database);
                $num = mysqli_num_rows($db_querry);

                ?>
                    <div class="cart_numbers"><?php echo $num; ?></div>



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
                  <a href="profile.php">My Account</a>
                </ul>
            </div>

            <!-- <div class="help_center">
                <ul class="help_list">
                </ul>
            </div> -->
        </nav>
    </header>
      <!--End of header section -->

    <!-- css styles -->
    <link rel="stylesheet" href="css_files/chat.css">
    </html>
  
<body>
    <div class="container">
            <h4>ORIE OBA ONLINE LIVE CHAT</h4>
            <P>Contact Us through this live chat section</P>
            <div class="col-md-6 card">
        
                <form action="" method="post">
                  <div class="chats">
                    <div class="orthers_chats">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat ab tempore sapiente commodi enim necessitatibus doloremque animi porro autem obcaecati rerum sunt repudiandae magnam quidem quos facere laudantium atque, hic labore impedit eos dicta iste. Cum sit rem itaque ipsum, pariatur, possimus qui ipsam sed fugit, natus esse non nulla animi ut reprehenderit. Nesciunt dicta, accusantium numquam enim dignissimos, praesentium eos nisi ab, unde est perspiciatis! Blanditiis ex optio repellendus provident ipsa ipsam sint iste dolore, obcaecati deleniti rerum numquam vitae, exercitationem vero cumque suscipit consequuntur expedita quam quo assumenda commodi. Eum repudiandae nam alias, minima perspiciatis veniam eius iste.
                    </div>

                    <div class="users_chats">
                        how can i buy this product.
                         i am leaving in lagos. so how can i get this product pls.
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nobis mollitia minima ducimus commodi voluptatibus sint ullam pariatur. Debitis numquam ullam blanditiis corporis, asperiores neque assumenda quo iste cumque libero. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem ab possimus unde, culpa esse cumque dolore minus doloribus eius odit incidunt corporis officia quasi itaque dolor, nostrum quam illo iure perferendis consequuntur sed? Commodi perferendis delectus enim adipisci non et explicabo omnis voluptate, voluptatibus earum, sapiente tempore, maxime reprehenderit nulla!
                    </div>
                  </div>

                    <div class="form_group">
                 <textarea placeholder="Your Message" class="form-control" name="send_message"></textarea>
                 <button type="submit" name="send" class="btn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


  <script src="js_files/chat.js"></script>
    <?php include 'footer.php'; ?>
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