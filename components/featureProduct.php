
<?php  

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['feature_submit'])){

      require("function.php");

      $user_id = $_POST['user_id'];
      $item_id = $_POST['item_id'];
  
   $sql = "INSERT INTO `cart` (`user_id`, `item_id`) VALUES ('$user_id', '$item_id')";
   $query = mysqli_query($con,$sql);
   if($query){
    // header('Location:'.$_SERVER['PHP_SELF']);
   }  
    }
  }


  require("function.php");
  $result = mysqli_query($con,$items);
  $num=0;

?>


<section id="feature_product">
        <div class="container py-5">
          <h4 class="font-Rubik font-size-20">Feature Product</h4>
          <hr />

          <?php while( $num < 4 && ($item = mysqli_fetch_assoc($result)) ){ ?>


          <div class="d-flex flex-row flex-wrap justify-content-evenly">
            <div
              class="d-flex flex-column justify-content-center align-items-center"
            ><a href="<?php printf("%s?item_id=%s","product.php",$item["item_id"]) ?>">
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
              <h5><?php echo $item["item_price"] ?> </h5>

              <form action="" method="post">
                <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?>">
                <input type="hidden" name="user_id" value="<?php echo 1;?>">
              <button type="submit" name="feature_submit" class="btn btn-warning font-size-12">
                Add To Cart
              </button>
            </form>
              
            </div>

            <?php $num++; }?>
          </div>
         
        </div>
       
      </section>