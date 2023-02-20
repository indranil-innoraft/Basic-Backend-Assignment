<?php
//Starting a session for accessing the session variables.
session_start();

//Check user is login or not.
if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }

//it will include the userInfo class.
require('../userInformation.php');

//it will include the validation class.
require('../validation.php');

//$firstName, $lastName getting values from $_POST builtin variable.
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];

//$fileName, $filePath, $type, $tempName, $size getting values from $_FILES builtin variable.
$fileName = $_FILES['image']['name'];
$filePath = $_FILES['image']['full_path'];
$type = $_FILES['image']['type'];
$tempName = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];

// check user enter a propper name or not.
if ($validate->checkUserName($firstName, $lastName) === true) {
  //set the session variable.
  $_SESSION['firstName'] = $firstName;
  $_SESSION['lastName'] = $lastName;
  //set the data to the user object.
  $user->setFirstName($firstName);
  $user->setLastName($lastName);
} else {
  //if invalid entry user need to redirect to the form page.
  header('Location: formWithImage.php');
}

//check user uploded photo is valid or not.
if ($validate->checkUploadedFile($fileName, $tempName, $filePath, $type, $size) === false) {
  
  //if invalid entry user need to redirect to the form page.
  header('Location: formWithImage.php');
} else {
  $path = "upload_image/" . $fileName;
  $_SESSION['uploadedImage'] = $path;

  //If uploaded image is valid then send the image upload_image folder.
  move_uploaded_file($tempName, $path);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-2 Output</title>
  <link rel="stylesheet" href="../outputScreenStyle.css">


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