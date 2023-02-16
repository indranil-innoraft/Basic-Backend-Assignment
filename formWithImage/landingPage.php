<?php
session_start();

//it will include the userInfo class.
require('../userInformation.php');
//it will include the validation class.
require('../validation.php');

/**
 * @param string $firstName.
 * @param string $lastName.
 */
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];

/**
 *geting the $_FILES array variale value in the different variable.
 */
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
      echo $_SESSION['firstName'] . " " . $_SESSION['lastName'];
      ?>
    </h1>
    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />

  </div>


</body>

</html>