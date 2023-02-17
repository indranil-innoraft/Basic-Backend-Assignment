<?php
session_start();

if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }

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
      echo $user->getFirstName() . " " . $user->getLastName();
      ?>
    </h1>
    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />
    <div class="file-name">
      <h6>Subject With Marks</h6>

      <?php
      
      $valideateSubjectMarks = new ValidateSubjectMarks();
      if($valideateSubjectMarks->validateUserInput($textArea) === false){
        header('Location: formWithMarks.php');
      }
      
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