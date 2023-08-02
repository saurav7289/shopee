<?php 
  $showAlert = false;
  $showError = false;

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['register_submit'])){

      require("function.php");

      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['Cpassword'];
  
      $existSql = "SELECT * FROM `user` WHERE email_id = '$email'";
      $result = mysqli_query($con, $existSql);
      $numExistRows = mysqli_num_rows($result);
      if($numExistRows > 0)
      {
        $showError = true;
      }
      else
      {
        if($password == $cpassword)
        {
            $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`email_id`, `c_password`, `register_date`) VALUES ('$email', '$hash', current_timestamp())";
        $query = mysqli_query($con,$sql);

        if($query){
          $showAlert = true;
          header('location:loginPage.php');
         }
      } else{$showError = true;}  
      }         

    }
  }

?>


<?php if($showAlert){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS !</strong> You have registered successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php };?>

<?php if($showError){?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Wrong !</strong> Invalid Credentials!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php };?>




<div class="d-flex justify-content-center align-item-center flex-column my-5 h-75">
<h3 class="m-auto py-5">SING UP</h3>

<form action="registerPage.php" method="post" class="d-flex flex-column gap-4 w-25 m-auto" >

  <input type="email" name="email" placeholder="Email" >
  <input type="password" name="password" placeholder="Password">
  <input type="password" name="Cpassword" placeholder="Confirm-Password">
  <button type="submit" name="register_submit">SING UP</button>
</form>
<h5 class="m-auto py-5">Have An Account? <a href="loginPage.php">LOGIN</a></h5>
</div>