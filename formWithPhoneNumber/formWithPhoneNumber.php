<?php
//Starting a session for using $_SESSION builtin valriable.
session_start();

//Check user is login or not.
if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-4</title>
  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- local css  -->
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <!-- Include the navbar -->
  <?php include("../header/header.php"); ?>

  <div class="container">
    <form action="landingPage.php" method="post" enctype="multipart/form-data">
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
      <!-- upload image field -->
      <div class="mb-3">
        <label for="formFile" class="form-label" style="color: white;">Upload Image</label>
        <input class="form-control" name="image" type="file" id="formFile" accept="image/png, image/gif, image/jpeg">
      </div>
      <!-- text area field -->
      <div class="mb-3">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Enter subject|Marks" name="textArea" required></textarea>
      </div>
      <div class="form-group Num">
        <div class="code">
          <span class="country_code" style="color: white;">+91</span>
        </div>
        <div class="input_num">
          <input type="text" class=" form-control" name="phNum" id="ec-mobile-number" aria-describedby="emailHelp" placeholder="Phone no" maxlength="15" aria-row="10" value="" required/>
        </div>

      </div>
      <!-- error section -->
      <div class="error">
        <?php
        if (isset($_SESSION['formErrorMsg'])) {
          $errorMsg = $_SESSION['formErrorMsg'];
          echo $errorMsg;
          //On reload same error msg should not be displayed on the same page.
          unset($_SESSION['formErrorMsg']);
        } ?>
      </div>
      <!-- submit button -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

   <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <!-- javascript -->
  <script src="../form/script.js"></script>
  <!-- jquery -->
  <script src="../validation.js"></script>

</body>

</html>