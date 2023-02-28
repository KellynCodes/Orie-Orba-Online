<?php
session_start();
include 'conn.php';
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}else{
    $user_id = $_SESSION['id'];

} 

$sql = "SELECT * FROM users where id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while($row= $result->fetch_array()){
    $user_id = $row['id'];
    $email = $row['email'];
    $fname = $row['fname'];
     $lname = $row['lname'];
    $password = $row['password'];
    $location = $row['location'];
    $phone = $row['phone'];
    $occupation = $row['occupation'];
    
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
                        <img src="./assets/Orie Orba-002-01.png" alt="">
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
          
                $database = "SELECT * FROM cart WHERE user_id = ?";
                $stmt = $conn->prepare($database);
                $stmt->bind_param("s", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $num = $result->num_rows;

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