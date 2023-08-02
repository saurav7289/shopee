<?php

// ob_start();
session_start();

  include('header.php');

 
      // heroSection start 
     
     include("components/heroSection.php");
     
      // heroSection end

      // feature product
      include("components/featureProduct.php");
      // feature product end 
    
      // special price start
      include("components/specialPrice.php");
      // special price end
     

      include("footer.php");
    ?>