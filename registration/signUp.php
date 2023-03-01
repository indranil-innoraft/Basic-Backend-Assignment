<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- Css link -->
  <link rel="stylesheet" href="/css/style.css">
</head>
<div class="container">
  <!-- Register form -->
  <form action="registerUser.php" method="post">
    <div class="title">
      <h4>Sign Up</h4>
    </div>
    <!-- First name field -->
    <div class="mb-3">
      <input type="text" id="typingFirstName" name="fname" class="form-control " placeholder="First Name" required>
    </div>

    <!-- Last name field -->
    <div class="mb-3">
      <input type="text" id="typingLastName" name="lname" placeholder="Last Name" class="form-control" required>
    </div>

    <!-- Phone Number -->
    <div class="input_num">
      <input type="text" class=" form-control" name="phNum" id="ec-mobile-number" aria-describedby="emailHelp" placeholder="Phone no" maxlength="15" aria-row="10" value="" required />
    </div>

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
      session_start();

      if (isset($_SESSION['formErrorMsg'])) {

        echo $_SESSION['formErrorMsg'];
        //On reload error should not be displayed on screen.
        unset($_SESSION['formErrorMsg']);
      }

      ?>

    </div>

    <!-- submit button -->
    <div class="flex">
      <button type="submit" class="btn btn-primary register-btn">Register Now</button>
    </div>
    <div class="form-bottm-section">
      <p><a href="../index.php">Go Back</a></p>
    </div>
  </form>

</div>

<body>
</body>

</html>