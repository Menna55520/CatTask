<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form </title>
    <link rel="stylesheet" href="../style/style.css">
    </head>
  <?php session_start() ;?> 
<body>
    <div class="wrapper">
    <h2>Registration</h2>
    <?php if(isset($_SESSION['errors']['insert'])):?>
          <div class="error"><?php echo $_SESSION['errors']['insert'] ; unset($_SESSION['errors']['insert'])?></div>
    <?php endif; ?>
    <form action="../handle/index.php" method="post">
      <div class="input-box">
        <input type="text" name="userName" placeholder="Enter your userName" value="<?php if(isset($_SESSION['userName'])) echo $_SESSION['userName'] ; unset($_SESSION['userName'])?>" required>
        <?php if(isset($_SESSION['errors']['userName'])):?>
          <div class="error"><?php echo $_SESSION['errors']['userName'] ; unset($_SESSION['errors']['userName'])?></div>
        <?php endif; ?>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ; unset($_SESSION['email'])?>" required>
        <?php if(isset($_SESSION['errors']['email'])):?>
          <div class="error"><?php echo $_SESSION['errors']['email'] ; unset($_SESSION['errors']['email'])?></div>
        <?php endif; ?>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
        <?php if(isset($_SESSION['errors']['password'])):?>
          <div class="error"><?php echo $_SESSION['errors']['password'] ; unset($_SESSION['errors']['password'])?></div>
        <?php endif; ?>
      </div>
      <div class="input-box">
        <input type="password" name="confirmPassword" placeholder="Confirm password" required>
        <?php if(isset($_SESSION['errors']['confirmPassword'])):?>
          <div class="error"><?php echo $_SESSION['errors']['confirmPassword'] ; unset($_SESSION['errors']['confirmPassword'])?></div>
        <?php endif; ?>
      </div>
      
      <div class="input-box button">
        <input type="Submit" name="Register" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>

</body>
</html>
