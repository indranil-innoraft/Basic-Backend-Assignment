<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- local css  -->
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
  <div class="container">
    <!-- login form -->
  <form action="userValidation.php" method="post">
    <!-- email id field -->
    <div class="form-group">
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" required>
    </div>
    <!-- password field-->
    <div class="form-group">
      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
    </div>
    <!-- error class -->
    <div class="error">
      <?php
      if(isset($_SESSION['userValidateError'])){
        //@param string $error_msg
        $error_msg = $_SESSION['userValidateError'];
        echo $error_msg;
        unset($_SESSION['userValidateError']);
      }
      ?>
    </div>
    <!-- submit button -->
    <button type="submit" class="btn btn-primary">Log In</button>
  </form>
  </div>
</body>
</html>