<?php 
session_start();
include 'conn.php';

if(isset($_POST['login'])){

  $email = $_POST['email'];
  $password = $_POST['password'];

if(!empty($email)){
  if(!empty($password)){
   
  $sql = "SELECT * FROM users where email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $output = $stmt->get_result();
  $num = $output->num_rows;
    if($num == 1){
    while($row = $output->fetch_assoc()){
     if(password_verify($password, $row['password'])){   
      $_SESSION['email'] = $row['email'];
      $_SESSION['fname'] = $row['fname'];
      $_SESSION['lname'] = $row['lname'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['id'] = $row['id'];
      $_SESSION['location'] = $row['location'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['occupation'] = $row['occupation'];


      header("location: index.php");
      
}else{
  $msg = "Password is incorrect ";
  $msgtype = "danger";
}

   }

    }else{
    $msg = "User with this email is not found please check if your email is incorrect";
    $msgtype = "danger";
}

}else{
$msg = "password is required";
$msgtype = "danger";
}    

}else{
    $msg = "Email is required";
    $msgtype = "danger";
    }  
    
    

}

?>
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
    <header style="display: none;">
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
      <!--End of header section -->
    <main>
              <!-- TOP SALES -->
            <section>
                    <div class=" container" style="margin-top: 6em">

                        <!-- first side of the tables -->
                        <div class="left_container">
                            <h3>Login</h3>

                            <form method="post">


                            <?php

                               if(isset($_GET['newpwd'])){
                                if($_GET['newpwd'] == "passwordupdated"){
                                    $msg = "Your have successfully updated your password, You can now login with your new password.";
                                }
                               }
                            ?>

                                <div class="alert alert-<?php echo $msgtype ?> text-center"><?php echo $msg ?></div>
                                
                            <div class="form-group">
                                <i class="bi bi-envelope-fill"></i>
                                <input  type="email" name="email" value="<?php echo $email ?>" placeholder="Email" >
                            </div>
                           <div class="form-group" >
                        <i class="bi bi-key-fill"></i>
                        <input type="password" name="password" value="<?php echo $password ?>" placeholder="Password" id="myInput" >
                                <span class="eye">
                                <i id="hide1" class="bi bi-eye"></i>
                                <i id="hide2" class="bi bi-eye-slash"></i>
                                </span>
                           </div>
                    
                         <div class="remember_me">
                         <span style="color: black; letter-spacing: 1px;"><input  type="checkbox" name="remember_me"> Remember me</span>
                            <a href="forgot_password.php">Forgot Password?</a>
                        </div>

                          <div class="btn_container">
                             <button type="submit" name="login">Login</button> 

                        </div>

                    </form>
                        </div>
                        <!-- end of the first side of the table -->

                        <!-- second side of the tables -->
                        <div class="right_container">
                             <div class="header">
                            <h3>SignUp</h3>
                             </div>
                             <p>Don't have account?</p>
                             <div class="links">
            <h5>Your can login in with</h5>
            <ul>
                <a href="https://fb.com/EnuguTechHub"><i class="bi bi-facebook"></i></a>
               <a href="https://fb.com/EnuguTechHub"><i class="bi bi-twitter"></i></a>
               <a href="https://fb.com/EnuguTechHub"><i class="bi bi-whatsapp"></i></a>
               <a href="https://fb.com/EnuguTechHub"><i class="bi bi-linkedin"></i></a>
            
            </ul>
        </div>
                        <div class="btn_container">
                            <a href="register.php">SignUp</a>
                        </div>

                        </div>
                        <!-- end of second side of the table -->

                    </div>
                    
            </section>
    </main>
<?php include 'footer.php' ?>
