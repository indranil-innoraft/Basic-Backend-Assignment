
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
  <link rel="stylesheet" href="./css/style.css">

</head>

<body>
  <div class="container">
    <!-- login form -->
    <form action="validateLogin.php" method="post">
      <div class="title">
        <h4>Login In</h4>
      </div>
      <!-- email id field -->
      <div class="form-group">
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" >
      </div>

      <!-- password field-->
      <div class="form-group">
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" >
      </div>

      <!-- error class -->
      <div class="error">

        <?php
        session_start();

        if (isset($_SESSION['userValidateError'])) {
          
          echo $_SESSION['userValidateError'];
          //On reload error should not be displayed on screen.
          unset($_SESSION['userValidateError']);

        }

        if (isset($_SESSION['formErrorMsg'])) {
          
          echo $_SESSION['formErrorMsg'];
          //On reload error should not be displayed on screen.
          unset($_SESSION['formErrorMsg']);

        }


        ?>

      </div>

      <!-- submit button -->
      <button type="submit" name="login-btn" class="btn btn-primary">Log In</button>

      <!-- Sign up button -->
      <button type="submit" name="register" class="btn btn-primary sign-up">Sign Up</button>
      <div class="form-bottm-section">
        <p>if you don't remember your password,<a href="./forgetPassword/index.php">Forget Password</a></p>
      </div>
    </form>
  </div>
</body>
</html>
