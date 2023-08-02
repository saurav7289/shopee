
<?php 
   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin = true;
   }
   else{
    $loggedin = false;
   }



    require("function.php");
    $cartResult = mysqli_query($con, $cartItems);
    $count = 0;
    foreach($cartResult as $cart)
    {
      $count++;
    }
    

?>



<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&family=Raleway&family=Rubik&display=swap"
      rel="stylesheet"
    />
    <!-- google-font -->

    <!-- bootStrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <!-- bootStrap -->

    <!-- bootStrap ICON -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <!-- bootstrap-icons -->

    <!-- css -->
    <link rel="stylesheet" href="style.css" />
    <!-- css -->

  </head>
  <body>
    <!-- header start -->
    <div id="header">
      <?php if(!$loggedin){ ?>
      <a href="loginPage.php" class="mx-3 border-right border-left text-dark">Login</a>
      <a href="registerPage.php" class="mx-4 border-right text-dark">Register</a>
      <?php } ?>

      <?php if($loggedin){ ?>
      <a href="logout.php" class="mx-3 border-right border-left text-dark">Logout</a>
      <?php } ?>
    </div>

    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Shopee</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav m-auto font-Rubik">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"
                >On Sale</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"
                >Category <i class="bi bi-chevron-down"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"
                >Product <i class="bi bi-chevron-down"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Blog</a>
            </li>
          </ul>
          <form action="#" class="font-size-14 font-raleway">
            <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
              <span class="font-size-16 px-2 text-white"
                ><i class="bi bi-cart-check-fill"></i
              ></span>
              <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo $count; ?></span>
            </a>
          </form>
        </div>
      </div>
    </nav>
    <!-- navbar end -->
    <!-- header end -->

    <!-- main start -->
    <main id="main-site">
      <!-- heroSection start -->