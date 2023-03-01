<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- bootstrap cdn link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <!-- change password form -->
    <form action="changeInDatabase.php" method="post">
    <div class="title">
      <h4>Reset Password</h4>
    </div>
      <!-- OTP field-->
      <div class="form-group">
        <input type="text" class="form-control" name="otp"  placeholder="OTP" >
      </div>

      <!-- password field-->
      <div class="form-group">
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" >
      </div>

      <!-- error class -->
      <div class="error">

        <?php
        session_start();

        if (isset($_SESSION['formErrorMsg'])) {
          
          echo $_SESSION['formErrorMsg'];
          //On reload error should not be displayed on screen.
          unset($_SESSION['formErrorMsg']);

        }

        ?>

      </div>

      <!-- submit button -->
      <button type="submit" class="btn btn-primary">Log In</button>
    </form>
  </div>

    
</body>
</html>