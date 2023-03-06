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
    <form action="validateOTP.php" method="post">
      
      <div class="title">
        <h4>OTP Validataion</h4>
      </div>
      
      <!-- OTP field-->
      <div class="form-group">
        <input type="text" class="form-control" name="otp" placeholder="OTP">
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
      <button type="submit" class="btn btn-primary">Validate OTP</button>
      <div id="counter">
      </div>
    </form>
  </div>

</body>
<script src="../script/countDown.js"></script>
</html>
