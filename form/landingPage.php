<?php
session_start();

if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }

//Include the userInformation.
require('../userInformation.php');
//It include validation class for validate the inputs.
require('../validation.php');

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];

// check user enter a propper name or not.
if ($validate->checkUserName($firstName, $lastName) === true) {
  $_SESSION['firstName'] = $firstName;
  $_SESSION['lastName'] = $lastName;
  //set the data to the user object.
  $user->setFirstName($firstName);
  $user->setLastName($lastName);
} 
else {
  header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-1 Output</title>
  <link rel="stylesheet" href="../outputScreenStyle.css">

</head>
<body>
  <!-- show the result -->
  <div class="info">
    <h1>Hello
      <?php
      echo $user->getFirstName() . " " . $user->getlastName();
      ?>
    </h1>
  </div>

</body>
</html>