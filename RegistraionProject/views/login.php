<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/style.css">
  </head>
  <?php session_start()?>
  <?php if(isset($_SESSION['success'])):?>
    <script> alert("<?php echo $_SESSION['success']?>")</script>
  <?php endif ; unset($_SESSION['success'])?>

  <?php if(isset($_SESSION['errors'])):?>
    <script> alert("<?php echo $_SESSION['errors']?>")</script>
  <?php endif ; unset($_SESSION['errors'])?>
<body>
  <div class="wrapper">
    <h2>Login</h2>
      <form action="../handle/login.php" method="post">
      
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Enter your password" name="password" required>
      </div>
      
      <div class="input-box button">
        <input type="Submit" value="login" name="login">
      </div>
      <div class="text">
        <h3>Do not have an account? <a href="index.php">Register now</a></h3>
      </div>

      
    </form>
  </div>

</body>
</html>
