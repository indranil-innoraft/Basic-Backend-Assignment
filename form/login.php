<?php
 session_start();
 if (!isset($_SESSION['login'])) {
  header('location: ../index.php');
}
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

  <!-- This will include the nav bar. -->
  <?php require('../header/header.php'); ?>

  <div class="container">
    <form action="landingPage.php" method="post" >
      <!-- First name field -->
      <div class="mb-3">
        <input type="text" id="typingFirstName" name="fname" class="form-control " placeholder="First Name" required>
      </div>
      <!-- Last name field -->
      <div class="mb-3">
        <input type="text" id="typingLastName" name="lname" placeholder="Last Name" class="form-control" required>
      </div>
      <!-- full name field -->
      <div class="mb-3">
        <input type="text" name="lname" id="target" placeholder="Full Name" class="form-control" disabled>
      </div>
      <!-- error section -->
      <div class="error">
        <?php
        //If some error occur after submitting the form its show the error message this area.
        if (isset($_SESSION['formErrorMsg'])) {
          $error_msg = $_SESSION['formErrorMsg'];
          echo $error_msg;
          //After reload the page it shouldn't show the same error.
          unset($_SESSION['formErrorMsg']);
        } 
        ?>
      </div>
      <!-- submit button -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
   <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- javascript link -->
  <script src="script.js"></script>
  <script src="../validation.js"></script>
</body>

</html>