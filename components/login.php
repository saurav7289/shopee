<?php 
  $showAlert = false;
  $showError = false;

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['login_submit'])){

      require("function.php");

      $email = $_POST['email'];
      $password = $_POST['password'];
  
      $sql = "SELECT * FROM `user` WHERE email_id='$email'";

      $result = mysqli_query($con,$sql);
      $num = mysqli_num_rows($result);

      if($num == 1)
      {
        while($row = mysqli_fetch_assoc($result))
        {
          $user_id = $row['user_id'];
          if(password_verify($password, $row['c_password'])){
            
            $showAlert = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email_id'] = $email;
            $_SESSION['user_id'] = $user_id;
            header('location:index.php');
            
          }else{
            $showError = true;
          }
        }
        
      }else{
        $showError = true;
      }

    }
  }

?>







<?php if($showAlert){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS !</strong> Login Successfully.
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
<h3 class="m-auto py-5">LOGIN</h3>

<form action="loginPage.php" method="post" class="d-flex flex-column gap-4 w-25 m-auto" >

  <input type="email" name="email"  placeholder="Email" >
  <input type="password" name="password" placeholder="Password">
  <button type="submit" name="login_submit">SING IN</button>
</form>
<h5 class="m-auto py-5">Not a member? <a href="registerPage.php">Register</a></h5>
</div>