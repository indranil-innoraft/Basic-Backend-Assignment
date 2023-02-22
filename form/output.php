<!-- Provides the validation based on user inputs. -->
<?php require ('./validation.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-1 Output</title>
  <link rel="stylesheet" href="../css/outputScreenStyle.css">

</head>
<body>

  <!-- show the result -->
  <div class="info">
    <h1>Hello

      <?php

      //Getting first and last name of the user using getFirstName() and getLastName() method.
      echo $user->getFirstName() . " " . $user->getLastName();
      
      ?>

    </h1>
  </div>

</body>
</html>