<?php include 'header.php';

if(isset($_POST['add'])){
	$name = $_POST['name'];
	$product_id = $_POST['id'];
	$count = $_POST['count'];
	$image = $_POST['image'];
	$price = $_POST['price'];

	$sqq = "INSERT INTO cart(name,user_id,product_id,count,price,image) values(?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sqq);
    $stmt->bind_param("ssssss", $name, $user_id, $product_id, $count, $price, $image);
    $stmt->execute();

}


 ?>


      <!--End of header section -->
    <main>
        <!-- BANNER PAGE -->
        <div class="banner">
            <div class="categories">
                <ul class="categories_list_items">
                    <div><i class="fa-solid fa-spoon"></i> <a href="">Food Items</a></div>
                   <div><i class="fa-solid fa-charging-station"></i> <a href="">Electronics</a></div>
                    <div><i class="fa-solid fa-mobile-retro"></i> <a href="">Phones</a></div>
                    <div><i class="bi bi-pc-display-horizontal"></i> <a href="">Computers</a></div>
                </ul>
            </div>

            <div class="middle_banner">
                <img src="assets/Carusel-01.jpg" alt="">
            </div>

            <!-- ADVERTING  SECTION  -->
            <div class="advertersing">

              <div class="first_section">
                    <img src="assets/Carusel-02.jpg" alt="" style="object-fit:cover;">
              </div>

              <div class="second_section">
                <img src="admin/assets/img/dior_shoe.jpg" alt="">
              </div>

            </div>
            <!-- END OF ADVERTING  SECTION  -->

        </div>
        <!--end of banner page -->

              <!-- TOP SALES -->
            <section>
                <div class="header_text">
                    <h1>TOP SALES</h1>
                    <hr>
                </div>
                <div class="top_sales">


                <?php 
	$sql = "SELECT * FROM products";
	$exe = $conn->prepare($sql);
    $exe->execute();
    $result = $exe->get_result();

	while($row = $result->fetch_array()){
		$id = $row['id'];
        $category = $row['category'];
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];
	 ?>
                        <form method="post" class="index_form">
            
                            <div class="items">
                                <img src="admin/uploads/<?php echo $image ?>" alt="product">

                            <div>
                                <h5><?php echo $name ?></h5>
                                <P><i class="fa-solid fa-naira-sign laptops"></i><?php echo $price ?></P>
                            </div> 
                            <input type="number" name="count" value="1">
                            
		                      <button  style="margin-top: 1rem" class="btn" name="add">Add to cart</button>
                             
                                

                  </div>

                    <input type="hidden" name="image" value="<?php echo $image ?>">
                    <input type="hidden" name="name" value="<?php echo $name ?>">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="price" value="<?php echo $price ?>">
                    
	               </form>
                        <?php } ?>


                        
                 </div>
            </section>
    </main>

    <!-- FOOTER SECTION -->
   <?php include 'footer.php' ?>