<?php
session_start();

//import the userInfo class.
require('../userInformation.php');
//import the checkSubjectMarks class.
require('../checkSubjectMarks.php');
//import the validate class.
require('../validation.php');

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$textArea = $_POST['textArea'];

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
  header('Location: formWithMarks.php');
}

//check user uploded photo is valid or not.
if ($validate->checkUploadedFile($fileName, $tempName, $filePath, $type, $size) === false) {
  //if invalid entry user need to redirect to the form page.
  header('Location: formWithMarks.php');
} else {
  $path = "../formWithImage/upload_image/" . $fileName;
  $_SESSION['uploadedImage'] = $path;
  move_uploaded_file($tempName, $path);
}


function ckeckUserInfo($firstName, $lastName, $user)
{
  if (empty($firstName) || empty($lastName)) {
    $_SESSION['formErrorMsg'] = "field should not be empty.";
    header('Location:formWithMarks.php');
  } else if (is_numeric($firstName) || is_numeric($lastName)) {
    $_SESSION['formErrorMsg'] = "field should be alphabet.";
    header('Location:formWithMarks.php');
  } else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName)) {
    $_SESSION['formErrorMsg'] = "field should not be special character.";
    header('Location:formWithMarks.php');
  } else {
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
  }
}


function checkUploadedFile($fileName, $tempName)
{
  if (strlen($fileName) != 0) {
    $path = "../formWithImage/upload_image/" . $fileName;
    $_SESSION['uploadedImage'] = $path;
    move_uploaded_file($tempName, $path);
  } else {
    $_SESSION['formErrorMsg'] = "please upload file";
    header('Location:formWithMarks.php');
  }
}









// checkUploadedFile($fileName, $tempName);
// ckeckUserInfo($firstName, $lastName, $image, $user, $fileName, $tempName);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-3 Output</title>
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
    <div class="file-name">
      <h6>Subject With Marks</h6>

      <?php

      $valideateSubjectMarks = new ValidateSubjectMarks();
      $valideateSubjectMarks->validateUserInput($textArea);
      ?>
      <table>
        <tr>
          <?php
          $valideateSubjectMarks->getSubject();
          ?>
        </tr>

        <tr>
          <?php
          $valideateSubjectMarks->getMark();
          ?>
        </tr>
      </table>
    </div>
  </div>

</body>

</html>