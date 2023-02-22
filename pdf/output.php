<!-- Provides the validation operations. -->
<?php require ('./validation.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-6 Output</title>
  <link rel="stylesheet" href="../css/outputScreenStyle.css">
</head>

<body>
  <div class="info">
    <h1>Hello
      <?php
      //Display the full name of the user.
      echo $user->getFirstName() . " " . $user->getLastName();
      ?>
    </h1>
    <?php
    //Display the phone number useing getPhoneNumber() method.
    echo "<p>Phone no : " . $user->getPhoneNumber() . "</p>";

    //Display the phone number useing getEmailId() method.
    echo "<p>Email id : " . $user->getEmailId() . "</p>";
    ?>

    <!-- Display the uploaded image of the user. -->
    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />

    <h6>Subject With Marks</h6>
    
    <!-- Show the table of the subject and marks. -->
    <table>
      <tr>
        <!-- iterate over the subject array. -->
        <?php $valideateSubjectMarks->getSubject(); ?>
      </tr>

      <tr>
        <!-- iterate over the marks array. -->
        <?php $valideateSubjectMarks->getMark(); ?>
      </tr>
    </table>
    <!-- Download as pdf button. -->
    <a href="makePdf.php">Generate PDF Now</a>
  </div>

  </div>
</body>
</html>
