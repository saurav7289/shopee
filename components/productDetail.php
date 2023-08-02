<?php
// add to cart start
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['product_submit'])){

      $user_id = $_POST['user_id'];
      $item_id = $_POST['item_id'];
  
   if($con){
  
    $query = mysqli_query($con, "INSERT INTO `cart` (`user_id`, `item_id`) VALUES ('$user_id', '$item_id')");
    if($query){
      header('Location:'.$_SERVER['PHP_SELF']);
    }
        
  }else{
    die(mysqli_error($con));
  }
    }
  }
// add to cart end



// product showing
  $item_id = $_GET["item_id"] ?? 1;

  require("function.php");

  $result = mysqli_query($con,$items);

  while($item = mysqli_fetch_assoc($result)){

  if($item["item_id"] == $item_id)
  {

  
?>


<session id="product" class="py-3">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <img
                src="<?php echo $item["item_image"]?>"
                alt="product"
                class="img-fluid"
              />
              <div
                class="d-flex p-4 font-size-16 font-baloo"
              >
                <div class="col">
                  <button type="submit" class="btn btn-danger font-size-14 px-4 mx-5">
                    Proceed to Buy
                  </button>
                </div>
                <div class="col px-4">
                <form action="" method="post">
                <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?>">
                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
              <button type="submit" name="product_submit" class="btn btn-warning font-size-14 px-5 mx-5">
                Add To Cart
              </button>
            </form>
                </div>
              </div>
            </div>
            <div class="col-sm-6 py-5">
              <h5 class="font-baloo font-size-20"><?php echo $item["item_name"]?></h5>
              <small>by <?php echo $item["item_brand"]?></small>
              <div class="d-flex">
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                </div>
                <a href="#" class="px-2 font-raleway font-size-14"
                  >20,534 rating | 10000+ answered question</a
                >
              </div>
              <br />
              <hr class="m-0" />

              <!-- product price -->
              <table class="my-3">
                <tr class="font-raleway font-size-14">
                  <td>M.R.P.</td>
                  <td><strike>$162.00</strike></td>
                </tr>
                <tr class="font-raleway font-size-14">
                  <td>Deal Price</td>
                  <td class="font-size-20 text-danger">
                    <span>$<?php echo $item["item_price"]?></span
                    ><small class="text-dark font-size-12"
                      >&nbsp &nbsp include all of taxes</small
                    >
                  </td>
                </tr>
                <tr class="font-raleway font-size-14">
                  <td>You Save</td>
                  <td><span class="font-size-16 text-danger">$10.00</span></td>
                </tr>
              </table>
              <!-- product price -->

              <!-- policy -->
              <div id="policy">
                <div class="d-flex justify-content-around">
                  <div class="return text-center mr-5">
                    <div class="font-size-20 my-2 color-second">
                      <span
                        class="bi bi-arrow-repeat border p-2 rounded"
                      ></span>
                    </div>
                    <a href="#" class="font-raleway font-size-12"
                      >10 Days <br />
                      Replacement</a
                    >
                  </div>
                  <div class="return text-center mr-5">
                    <div class="font-size-20 my-2 color-second">
                      <span class="bi bi-truck border p-2 rounded"></span>
                    </div>
                    <a href="#" class="font-raleway font-size-12"
                      >On Time <br />
                      Delivered</a
                    >
                  </div>
                  <div class="return text-center mr-5">
                    <div class="font-size-20 my-2 color-second">
                      <span class="bi bi-check-all border p-2 rounded"></span>
                    </div>
                    <a href="#" class="font-raleway font-size-12"
                      >1 Year <br />
                      Warrenty</a
                    >
                  </div>
                </div>
              </div>
              <!-- policy -->
            
              <hr />
  
              <br>
              <br>
            </div>
            
            <hr>
          </div>
          
          <h4 class="font-baloo">Product Description</h4>
          <p class="font-raleway text-light-emphasis">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</p>
        </div>
      </session>


      <?php }} ?>