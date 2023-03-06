<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password</title>
  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container">
    <form action="generateOTP.php" method="post">
    <div class="title">
      <h4>Generate OTP</h4>
    </div>
      <!-- email id field -->
      <div class="form-group">
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter Register Email">
      </div>
      <!-- Reset password button -->
      <button type="submit" name="register" class="btn btn-primary sign-up">Send the OTP</button>
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
      <div class="form-bottm-section">
        <p><a href="../index.php">Go Back</a></p>
    </div>
    </form>
  </div>
</body>

</html>