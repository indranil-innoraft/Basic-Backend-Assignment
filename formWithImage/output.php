<!-- Provides the validation operations based on user inputs. -->
<?php require ('./validation.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-2 Output</title>
  <link rel="stylesheet" href="../css/outputScreenStyle.css">

</head>

<body>
  <div class="info">
    <h1>Hello

      <?php

      //Printing first and last name of the user using getFirstName() and getLastName() methods.
      echo $user->getFirstName() . " " .  $user->getLastName();

      ?>

    </h1>

    <!-- Display the uploaded image. -->
    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />

  </div>
</body>
</html>
