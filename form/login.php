<?php
session_start();

// validateUserInfo($_POST['fname'],$_POST['lname']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- bootstrap cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- local css file -->
  <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color: black;">

  <?php
  include('../header/header.php');
  ?>

  <div class="container">
    <form action="landingPage.php" method="post">
      <!-- First name field -->
      <div class="mb-3">
        <input type="text" onkeydown="liveTyping()" id="typingFirstName" name="fname" class="form-control " placeholder="First Name">
      </div>
      <!-- Last name field -->
      <div class="mb-3">
        <input type="text" onkeydown="liveTyping()" id="typingLastName" name="lname" placeholder="Last Name" class="form-control">
      </div>
      <!-- full name field -->
      <div class="mb-3">
        <input type="text" name="lname" id="target" placeholder="Full Name" class="form-control" disabled>
      </div>
      <!-- error section -->
      <div class="error">
        <?php
        if (isset($_SESSION['formErrorMsg'])) {
          $errorMsg = $_SESSION['formErrorMsg'];
          echo $errorMsg;
          unset($_SESSION['formErrorMsg']);
        } ?>
      </div>
      <!-- submit button -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="script.js"></script>
</body>

</html>