<?php 
session_start();
include 'conn.php';
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}else{
    $user_id = $_SESSION['id'];

} 



$db = "SELECT * FROM USERS where id = ?";
$stmt = $conn->prepare($db);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result= $stmt->get_result();
$num = $result->num_rows;

while($row = $result->fetch_assoc()){
    $fname = $row['fname'];
    $lname = $row['lname'];
    $phone = $row['phone'];
    $email = $row['email'];
    $password = $row['password'];
    $location = $row['location'];
    $occupation = $row['occupation'];
    $date = $row['reg_date'];

    //UPDATING USER DETAILS 
    if(isset($_POST['update_profile'])){
        $update_fname = $_POST['update_fname'];
        $update_lname = $_POST['update_lname'];
        $update_email = $_POST['update_email'];
        //HASHING PASSWORD
        $update_password = $_POST['update_password'];
        $hashed_update_password = password_hash($update_password, PASSWORD_DEFAULT);
        //END OF HASHING PASSWORD
        $update_phone = $_POST['update_phone'];
        $update_occupation = $_POST['update_occupation'];
        $update_location = $_POST['update_location'];
        
        $updatedb = "UPDATE users SET fname = ?, lname = ?, email = ?, password = ?, phone = ?, location = ?, occupation = ? WHERE id = ?";
        $stmt = $conn->prepare($updatedb);
        $stmt->bind_param("ssssssss", $update_fname, $update_lname, $update_email, $hashed_update_password, $update_phone, $update_location, $update_occupation, $user_id);
        $updated = $stmt->execute();

        if($updated){
            $msg = "profile updated successfully. Please refresh this page to view latest changes";
            $msgtype = "success";
        }
  
}
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fname. " " . $lname ?></title>
    <link rel="stylesheet" href="css_files/profile.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/logo.jpeg" type="image/x-icon">

    <!-- CSS FILES -->
     <!-- bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
  
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
                        <div>User Name: <?php echo $fname. " " . $lname ?></div>
                    </div>


                    <a href="logout.php" class="btn">Logout</a>
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
                  <a href=""><?php echo $fname ?></a>
                </ul>
            </div>
            </nav>
        </header>
      <!--End of header section -->

   <div class="profile_container">
    <div class="profile">

        <div class="header_profile">
            <div class="img_container">
                <img src="assets/logo2.jpeg" alt="profile image">
            </div>
            <h4><?php echo $fname. " " .$lname ?></h4>
        </div>
      
        <div class="more_details">
            <div class="alert alert-<?php echo $msgtype ?>"> <?php echo $msg ?> </div>
         <form action="" method="post">
         <label for="name">Firstname
            <input type="text" name="update_fname" value="<?php echo $fname ?> ">
            </label>
         <label for="name">Lastname
            <input type="text" name="update_lname" value="<?php echo $lname ?> ">
            </label>
         <label for="email">Email
            <input type="email" name="update_email" value=" <?php echo $email ?> ">
            </label>
          <label for="username">
            Password: <input type="text" name="update_password" placeholder="<?php echo $password ?>">
          </label>
          <label for="phone">
            Phone: <input type="tel" name="update_phone" value=" <?php echo $phone ?>">
          </label>
           
          <label for="occupation">
            Occupation: <input type="text" name="update_occupation" value=" <?php echo $occupation ?>">
          </label>
           
          <label for="occupation">
            Location: <input type="text" name="update_location" value=" <?php echo $location ?>">
          </label>
           
          <label for="usersince">
            User-Since: <input type="tex" value="<?php echo $date ?>">
          </label>
                   <button type="submit" name="update_profile" class="btn">Save</button>
         </form>
        </div>

        <?php } ?>

    </div>
   </div> 
</body>

<?php include 'footer.php'; ?>