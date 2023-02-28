<?php include 'header.php' ?>
      <!--End of header section -->


    <main>
              <!-- TOP SALES -->
            <section>
                <div class="header_text">
                    <h1>Your Products Details</h1>
                    <hr>
                </div>
                <div class="product_details">
                  <div class="items_details">
                        <div class="left_col">
                                <img src="assests/mission.jpg" alt="">
                                <div class="quantity">
                                    <input type="number" name="quantity" value="1" class="quantity_bar">
                                </div>

                                <div class="product_pricing">
                                    <h5>Full Bag of Rice</h5>
                                    <P  id="product_price"><i class="fa-solid fa-naira-sign"></i> 60,500.56</P>
                                </div>

                            <div class="action_button">
                                <a href="saved_products.php" class="btn">SAVE FOR LATER</a>
                                <a href="#" class="btn">ADD TO CART</a>
                            </div>
                        </div>
                        <div class="full_price_cont">
                            <div class="pricing">
                                <span>$<h4>60500.56</h4></span>
                            </div>
                            <span class="pricee">Price</span>
                            </div>
                        </div>

                        <div class="product_description">
                                <h4>Iphone 13 Pro max</h4>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum, et fuga? Corrupti inventore obcaecati ad suscipit veritatis magnam quia nam repudiandae expedita explicabo. Maxime doloribus deserunt at. Expedita numquam ipsum accusantium asperiores aliquam blanditiis. Corrupti id quos rerum laudantium laboriosam, quis earum, dolores hic inventore eveniet sed quo sit reprehenderit?

                                <h3>6 gig ram</h3>
                                <p>Long lasting battery</p>
                        </div>
            
                 </div>

         </section>
    </main>

    <script> 



    // INCREASING PRICE OF PRODUCT DEPENDING ON THE NUMBER CHOOSED
let productPrice = document.querySelector('.pricing h4');
const priceBtn = document.querySelector('.pricee');
console.log(productPrice);
const productQuantity = document.querySelector('.quantity_bar');

productQuantity.addEventListener('input', () => {
    let inte = 0;

    if(productQuantity.value == inte || productQuantity.value < 0){
    priceBtn.style.display = "none";
    productPrice.innerText = "60500.56"
  }else{
    priceBtn.style.display = "flex";
   
  }
})
priceBtn.addEventListener('click', () => {   
    productPrice.innerText *= productQuantity.value;
    return;
})


</script>
<?php include 'footer' ?>