<?php
//Starting the session for checking user is authorized or not.
session_start();

//Check user is login in or not.
if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }

//It Provieds the userInformation class.
require('../userInformation.php');

//It Provides validation class for validate the inputs.
require('../validation.php');

//$firstName is getting value from $_POST inbuilt variable.
//$lastName is getting value from $_POST inbuilt variable.
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
      //Getting first and last name of the user using getFirstName() and getLastName() method.
      echo $user->getFirstName() . " " . $user->getLastName();
      ?>
    </h1>
  </div>

</body>
</html>