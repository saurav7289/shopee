<?php
ob_start();
include("header.php");

      
        // shopping cart section start 

       include("components/cartItem.php");

      //  shopping cart section end



      
      // topSale product start

      include("components/featureProduct.php");

      // topSale product end

      include("footer.php");
      ?>