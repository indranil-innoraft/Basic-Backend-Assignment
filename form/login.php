<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-1</title>
  <!-- bootstrap cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- local css file -->
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <?php
  //this will include the nav bar.
  require('../header/header.php');
  ?>

  <div class="container">
    <form action="landingPage.php" method="post">
      <!-- First name field -->
      <div class="mb-3">
        <input type="text"  id="typingFirstName" name="fname" class="form-control " placeholder="First Name" required>
      </div>
      <!-- Last name field -->
      <div class="mb-3">
        <input type="text"  id="typingLastName" name="lname" placeholder="Last Name" class="form-control" required>
      </div>
      <!-- full name field -->
      <div class="mb-3">
        <input type="text" name="lname" id="target" placeholder="Full Name" class="form-control" disabled>
      </div>
      <!-- error section -->
      <div class="error">
        <?php
          //if some error occur after submitting the form its show the error message this area.
        if (isset($_SESSION['formErrorMsg'])) {
          //@param string $error_msg
          $error_msg = $_SESSION['formErrorMsg'];
          echo $error_msg;
          //After reload the page it shouldn't show the same error.
          unset($_SESSION['formErrorMsg']);
        } ?>
      </div>
      <!-- submit button -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <!-- javascript link -->
  <script src="script.js"></script>
</body>

</html>