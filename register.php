<?php

session_start();
include 'conn.php';


if(isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatpassword'];
    $location = $_POST['location'];
    $occupation = $_POST['occupation'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    $sql1 = "SELECT * FROM users where email = ?";
    $stmt= $conn->prepare($sql1);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $output = $stmt->get_result();
    $result = $output->num_rows;
    
    

    if($result == 0){
   if($password == $repeatPassword){
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(fullname,username,email,phone,password,location,occupation,status,date) values(?,?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt->prepare($sql);
    $stmt->bind_param("sssssssss",  $fullname, $username, $email, $phone, $hashedPassword, $location, $occupation, $status, $date);
   
    $execute = $stmt->execute() or die(mysqli_error($conn));

    if($execute){
        header("Location: index.php");
    }else{
        $msg = 'Not Registered Please make sure all the information provided is correct';
        $msgtype = 'danger';
    }
   
   }else{
        $msg = "Password do not match";
        $msgtype = "danger";
   } 

}else{
    $msg = 'Email address already exist!';
    $msgtype = 'danger';
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
    <link rel="shortcut icon" href="assets/logo.jpeg" type="image/x-icon">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/register.css">
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
      <!--End of header section -->
      <!--End of header section -->
    <main>
              <!-- TOP SALES -->
            <section>
    
                <div  class="header_text">
                    <h2>Register</h2>
                    <h4> Register Today To Enjoy Our Unlimited Services <br>
                Make sure you fill the form appropriately </h4>
                </div>
                <div class="form_container">
                    <form method="post" class="form_group">
                    <div class="alert alert-<?php echo $msgtype ?> text-center"><?php echo $msg ?></div>
            <input type="text" name="fullname" placeholder="Fullname" value="<?php echo $fullname ?>" class="form-control" required="">
            <input type="text" name="username" placeholder="Username" value="<?php echo $username ?>" class="form-control" required="">
            <input type="email" name="email" placeholder="Email" value="<?php echo $email ?>" class="form-control" required="">
            <input type="number" name="phone" placeholder="Phone" value="<?php echo $phone ?>" class="form-control" required="">
            <input type="password" name="password" placeholder="Password" value="<?php echo $password ?>" class="form-control" required="">
            <input type="password" name="repeatpassword" placeholder="Repeat Password" value="<?php echo $repeatPassword ?>" class="form-control" required="">
            <input type="text" name="location" placeholder="Location" value="<?php echo $location ?>" class="form-control" required="">
            <input type="text" name="occupation" placeholder="Occuptation" value="<?php echo $occupation ?>" class="form-control" required="">
            <input type="hidden" name="status" value="active" required="">
            <input type="hidden" name="date" value="<?php echo date("Y.m.d: h.m.s") ?>" required="">

                        <button type="submit" name="register">Register</button>
                            <p>Already have an Account</p>
                        <a href="login.php" class="btn" style="	border-radius: 7px;">Login</a>

                    </form>
                </div>
            </section>
               
    </main>

   <?php include 'footer.php' ?>
   