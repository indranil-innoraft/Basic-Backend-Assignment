<!-- Provides the validaion operations. -->
<?php require ('./validation.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-5 Output</title>
  <link rel="stylesheet" href="../css/outputScreenStyle.css">

</head>

<body>
  <div class="info">
    <h1>Hello

      <?php

      //Using getFirstName() and getLastName() method printing the full name of the user. 
      echo $user->getFirstName() . " " . $user->getLastName();

      ?>

    </h1>
    <?php

    //Printing the phone number and email id of the user.
    echo "<p>Phone no :" . $user->getPhoneNumber() . "</p>";
    echo "<p>Email id :" . $user->getEmailId() . "</p>";
    
    ?>

    <!-- Display the image on the screen. -->
    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />

    <h6>Subject With Marks</h6>

    <table>
      <tr>
        <!-- Return the subject name. -->
        <?php $valideateSubjectMarks->getSubject(); ?>
      </tr>

      <tr>
        <!-- Return the marks. -->
        <?php $valideateSubjectMarks->getMark(); ?>
      </tr>
    </table>

  </div>
</body>
</html>
