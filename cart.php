<?php include 'header.php';



if(isset($_POST['remove'])){
    $id = $_POST['id'];
    $Delete_db = "DELETE FROM cart WHERE id = ?";
    $stmt = $conn->prepare($Delete_db);
    $stmt->bind_param("s", $id);
    $stmt->execute();

    if($stmt){
        $msg = 'You have removed this item from cart';
        $msgtype = 'danger';
    }
}



?>

      <!--End of header section -->
      <link rel="stylesheet" href="css_files/cart.css">
    <main>
        <!--product lists section-->
        <section>

            <div class="alert alert-<?php echo $msgtype ?>"><?php echo $msg ?></div>

            <div class="cart_list_container">
                

            <?php 
            $sql = "SELECT * FROM cart where user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_array()){
                $id = $row['id'];
                $name = $row['name'];
                $price = $row['price'];
                $count = $row['count'];
                $image = $row['image'];
            
             ?>
            
            
           
                <div class="cart_items">
                    <img src="admin/uploads/<?php echo $image ?>" alt="">
                    <h5><i class="fa-solid fa-naira-sign laptops"></i> <?php echo $price ?></h5>
                    <div><?php echo $count ?> Piece(s)</div>

                    <form method="post" style="margin-top: 2rem;">
                        <input type="hidden" name="product_id">
                        <div class="descriptions">
                            <input type="hidden" value="<?php echo $id ?>" name="id">
                    <button class="btn" name="remove">Remove</botton>
                </div>
                    </form>

               

            </div>
            <?php } ?>

           
            </div>

  <div class="account_container">
  <div class="account">
        <div class="total_price">
            <div><h1>Total Price:  <h5>1000000000 </h5></h4></div>
        </div>
      <div class="account_details">
        <div>
        <h4>Acc.Num: <h5>0669976019</h5></h4>
        </div>
        
        <div>
        <h4>Bank: <h5>GT Bank</h5></h4>
        </div>

     </div>

      
    </div>

    <button class="account_btn">
            Done
        </button>

  </div>

        </section>
    </main>
    
    <script src="js_files/main.js"></script>

  <?php include 'footer.php' ?>
 