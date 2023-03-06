<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Account</title>
  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- local css  -->
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>
  <div class="container">
    <form action="deleteAccount.php" method="post">
      <!-- password field-->
      <div class="form-group">
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Conform your password">
      </div>
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

      <!-- log in button -->
      <button type="submit" name="login-btn" class="btn btn-primary">Delete Account</button>
      <div class="form-bottm-section">
      <p><a href="../home/home.php">Go Back</a></p>
    </div>
    </form>
  </div>
</body>

</html>