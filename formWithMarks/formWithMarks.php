
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-3</title>
  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- local css  -->
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  
  <!-- Include navbar. -->
  <?php require("../header/header.php"); ?>

  <div class="container">
    <form action="output.php" method="post" enctype="multipart/form-data">
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
        <textarea class="form-control" placeholder="Enter subject|Marks" name="textArea" id="exampleFormControlTextarea1" rows="5" required></textarea>
      </div>
      <!-- error section -->
      <div class="error">
        <?php
        
        //Starting session variable for using $_SESSION builtin variable.
         session_start();
        //Check formErrorMsg is set or not.
        if (isset($_SESSION['formErrorMsg'])) {
          echo $_SESSION['formErrorMsg'];
          //After reload error message should not display on the screen.
          unset($_SESSION['formErrorMsg']);
        } 
        
        ?>
      </div>
      <!-- submit button -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <script src="../script/script.js"></script>
  <script src="../script/validation.js"></script>
</body>
</html>
