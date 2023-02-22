<!-- Provides the validation based on user inputs. -->
<?php require ("./validation.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-3 Output</title>
  <link rel="stylesheet" href="../css/outputScreenStyle.css">

</head>

<body>
  <div class="info">
    <h1>Hello
      <?php

      //Printing the values of first name and last name using getFirstName() and getLastName() methods.
      echo $user->getFirstName() . " " . $user->getLastName();
      ?>
    </h1>

    <!-- Display the image of the screen. -->
    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />

    <div class="file-name">

      <h6>Subject With Marks</h6>

      <table>
        <tr>
          <!-- Return the subject name. -->
          <?php $valideateSubjectMarks->getSubject(); ?>
        </tr>

        <tr>
          <!-- Return the marks of the subject. -->
          <?php $valideateSubjectMarks->getMark(); ?>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>
