<?php 

    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: loginPage.php");
        exit;
    }
  
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['delete_submit'])){

        require("function.php");

        $id = $_POST['itembtn_id'];
        
        
            $sql = "DELETE FROM `cart` WHERE item_id = $id ";
            $query = mysqli_query($con, $sql);
            if($query){
                header('Location:'.$_SERVER['PHP_SELF']);
            }        
    }
   }



   require("function.php");
 
$cartResult = mysqli_query($con,$cartItems);
$productResult = mysqli_query($con,$items);


$storeItem_id = array();
$i=0;
$sum=0;
while($item = mysqli_fetch_assoc($cartResult)){
    $storeItem_id[$i++] = $item["item_id"];
}

?>




<section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baloo font-size-20">Checkout product</h5>

                <!-- shopping cart items start -->
                <div class="row">
                    <div class="col-sm-9">
                        <?php  while( $item = mysqli_fetch_assoc($productResult))
                             {
                                foreach($storeItem_id as $stid){
                                    if($item["item_id"] == $stid)
                                        {
                                            $sum+= $item["item_price"]; ?>
                        <!-- cart item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item["item_image"] ?>" style=" height: 120px;" alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item["item_name"] ?></h5>
                                <small>by <?php echo $item["item_brand"] ?></small>

                                <!-- product rating -->
                                <div class="d-flex flex-row">
                                    <span><i class="bi bi-star-fill text-warning"></i></span>
                                    <span><i class="bi bi-star-fill text-warning"></i></span>
                                    <span><i class="bi bi-star-fill text-warning"></i></span>
                                    <span><i class="bi bi-star-fill text-warning"></i></span>
                                    <span><i class="bi bi-star-half text-warning"></i></span>
                                    <span>  &nbsp; &nbsp; <a href="#">20,534 rating</a></span>
                                  </div>
                                <!-- product rating -->
                                
                                <form action=""  method="post">
                                    
                                    <input type="hidden" name="itembtn_id" value="<?php echo $item["item_id"] ?>" >
                                    <button type="submit" name="delete_submit"  class="btn font-baloo text-danger px-1" >Remove</button>
                                </form>

                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-baloo">
                                    $<span class="product_price"><?php echo $item["item_price"] ?></span>
                                </div>
                            </div>
                            <!-- cart item -->
                            
                        </div>
                        <?php }}}?>
                    </div>
                    
                   
                    <div class="col-sm-3">
                        <div class="sub-total border text-center mt-2">
                            <h6 class="font-size-12 font-raleway text-success py-3">Your order is Elegible for Free Delivery</h6>
                            <div class="border-top py-4">
                                <h5 class="font-baloo font-size-20">Subtotal (<?php echo $i;?> item):&nbsp; <span class="text-danger">$<span class="text-danger " id="deal-price"><?php echo $sum; ?></span></span></h5>
                                <form action="pgRedirect.php" method="post">
                                <button type="submit" class="btn btn-success mt-3">Buy Now</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                </div>
               
              

                
                <!-- shopping cart items end -->
            </div>
           
        </section>