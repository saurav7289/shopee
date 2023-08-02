
<?php 
 
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['special_submit'])){

      require("function.php");

    $user_id = $_POST['user_id'];
    $item_id = $_POST['item_id'];

    $sql = "INSERT INTO `cart` (`user_id`, `item_id`) VALUES ('$user_id', '$item_id')";
    $query = mysqli_query($con,$sql);
    if($query){
    //  header('Location:'.$_SERVER['PHP_SELF']);
    } 
  }
  }



  require("function.php");

  $result = mysqli_query($con, $items);
  $result1 = mysqli_query($con, $items);
  $result2 = mysqli_query($con, $items);
  $result3 = mysqli_query($con, $items);

?>





<section id="Special_Price">
        <div class="container py-5">
          <h4 class="font-Rubik font-size-20">Special Price</h4>
          <hr />
          <div id="Special_price">
            <ul class="d-flex flex-row justify-content-end align-items-center">
              <li class="mx-3 fw-bold">
                <a href="#" onclick="showContent('All-Brand')">All Brand</a>
              </li>
              <li class="mx-3 fw-bold">
                <a href="#" onclick="showContent('Samsung')">Samsung</a>
              </li>
              <li class="mx-3 fw-bold">
                <a href="#" onclick="showContent('Apple')">Apple</a>
              </li>
              <li class="mx-3 fw-bold">
                <a href="#" onclick="showContent('Redmi')">Redmi</a>
              </li>
            </ul>
          </div>
          <div id="section">
            <!-- All Brand start -->
            
            <div id="All-Brand" class="content">
            
              <div class="d-flex flex-row flex-wrap justify-content-evenly">

              <?php while( $item = mysqli_fetch_assoc($result)){ ?>

                <div
                  class="d-flex flex-column justify-content-center align-items-center"
                >
                <a href="<?php printf("%s?item_id=%s","product.php",$item["item_id"]) ?>">
                  <img
                    class="trans"
                    src="<?php echo $item["item_image"] ?>"
                    width="250"
                    alt="mobile-img"
                  /></a>
                  <h5><?php echo $item["item_name"] ?></h5>
                  <div class="d-flex flex-row">
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star"></i></span>
                  </div>
                  <h5><?php echo $item["item_price"] ?></h5>
                  <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?>">
                <input type="hidden" name="user_id" value="<?php  ?>">
              <button type="submit" name="special_submit" class="btn btn-warning font-size-12">
                Add To Cart
              </button>
            </form>
                  <br><br>
                </div>
                
               
                <?php } ?>
               
              </div>
            </div>
           
            <!-- All Brand end -->


            <!-- Samsung start -->

            <div id="Samsung" class="content" style="display: none">
              <div class="d-flex flex-row flex-wrap justify-content-evenly">
              <?php while( $item = mysqli_fetch_assoc($result1)){ 
                if($item["item_brand"] == "Samsung"){
                ?>

                <div
                  class="d-flex flex-column justify-content-center align-items-center"
                >
                <a href="<?php printf("%s?item_id=%s","product.php",$item["item_id"]) ?>">
                  <img
                    class="trans"
                    src="<?php echo $item["item_image"] ?>"
                    width="250"
                    alt="mobile-img"
                  /></a>
                  <h5><?php echo $item["item_name"] ?> </h5>
                  <div class="d-flex flex-row">
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star"></i></span>
                  </div>
                  <h5><?php echo $item["item_price"] ?></h5>
                  <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?>">
                <input type="hidden" name="user_id" value="<?php  ?>">
              <button type="submit" name="special_submit" class="btn btn-warning font-size-12">
                Add To Cart
              </button>
            </form>
                  <br><br>
                </div>
              <?php } } ?>
              </div>
            </div>
            <!-- Samsung end -->

            <!-- Apple start -->
            <div id="Apple" class="content" style="display: none">
              <div class="d-flex flex-row flex-wrap justify-content-evenly">
                
              <?php while($item = mysqli_fetch_assoc($result2)){ 
                if($item["item_brand"] == "Apple"){
                ?>

                <div
                  class="d-flex flex-column justify-content-center align-items-center"
                >
                <a href="<?php printf("%s?item_id=%s","product.php",$item["item_id"]) ?>">
                  <img
                    class="trans"
                    src="<?php echo $item["item_image"]?>"
                    width="250"
                    alt="mobile-img"
                  /></a>
                  <h5><?php echo $item["item_name"] ?></h5>
                  <div class="d-flex flex-row">
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star"></i></span>
                  </div>
                  <h5><?php echo $item["item_price"] ?></h5>
                  <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?>">
                <input type="hidden" name="user_id" value="<?php ?>">
              <button type="submit" name="special_submit" class="btn btn-warning font-size-12">
                Add To Cart
              </button>
            </form>
                </div>
                <?php }} ?>
              
              </div>
            </div>
            <!-- Apple end -->

            <!-- Redmi start -->
            <div id="Redmi" class="content" style="display: none">
              <div class="d-flex flex-row flex-wrap justify-content-evenly">

              <?php while($item = mysqli_fetch_assoc($result3)){ 
                if($item["item_brand"] == "Redmi"){
                ?>

                <div
                  class="d-flex flex-column justify-content-center align-items-center"
                >
                <a href="<?php printf("%s?item_id=%s","product.php",$item["item_id"]) ?>">
                  <img
                    class="trans"
                    src="<?php echo $item["item_image"] ?> "
                    width="250"
                    alt="mobile-img"
                  /></a>
                  <h5><?php echo $item["item_name"] ?></h5>
                  <div class="d-flex flex-row">
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star-fill text-warning"></i></span>
                    <span><i class="bi bi-star"></i></span>
                  </div>
                  <h5>$<?php echo $item["item_price"] ?></h5>
                  <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?>">
                <input type="hidden" name="user_id" value="<?php ?>">
              <button type="submit" name="special_submit" class="btn btn-warning font-size-12">
                Add To Cart
              </button>
            </form>
                </div>
                  <?php }} ?>
              </div>
            </div>
            <!-- Redmi end -->
          </div>
        </div>
      </section>