<?php

session_start();

if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }

require('../userInformation.php');
require('../checkSubjectMarks.php');
require('../validation.php');
require('../email.php');


$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$textArea = $_POST['textArea'];
$phoneNo = $_POST['phNum'];
$email = $_POST['email'];

$apiKey = "STTONsCShOh5qIQFmndLNgiz3nfgFRN9";

$fileName = $_FILES['image']['name'];
$filePath = $_FILES['image']['full_path'];
$type = $_FILES['image']['type'];
$tempName = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];


$valideateSubjectMarks = new ValidateSubjectMarks();
if ($valideateSubjectMarks->validateUserInput($textArea) === false) {
  header('Location: compleForm.php');
}


$subjects = array();
$marks = array();

$emailFetch = new Email();

if ($emailFetch->validateEmail($email) === true) {
  $_SESSION['email'] = $email;
  $user->setEmailId($email);
} else {
  $_SESSION['formErrorMsg'] = "email is not valid.";
  header("Location: compleForm.php");
}


//user name check.
if ($validate->checkUserName($firstName, $lastName) === true) {
  //set the session variable.
  $_SESSION['firstName'] = $firstName;
  $_SESSION['lastName'] = $lastName;
  //set the data to the user object.
  $user->setFirstName($firstName);
  $user->setLastName($lastName);
} 
else {
  header('Location: compleForm.php');
}

//check user uploded photo is valid or not.
if ($validate->checkUploadedFile($fileName, $tempName, $filePath, $type, $size) === false) {
  //if invalid entry user need to redirect to the form page.
  header('Location: compleForm.php');
} else {
  $path = "../formWithImage/upload_image/" . $fileName;
  $_SESSION['uploadedImage'] = $path;
  move_uploaded_file($tempName, $path);
}


//check phone number.
if($validate->checkPhoneNumber($phoneNo) === true){
  $user->setPhoneNumber($_SESSION['phone']);
}
else{
  header("Location:compleForm.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-6 Output</title>
  <link rel="stylesheet" href="../outputScreenStyle.css">
</head>

<body>

  <div class="info">
    <h1>Hello
      <?php
      echo $user->getFirstName() . " " . $user->getLastName();
      ?>
    </h1>
    <?php
    echo "<p>Phone no : " . $user->getPhoneNumber() . "</p>";
    echo "<p>Email id : " . $user->getEmailId() . "</p>";
    ?>

    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />
    <h6>Subject With Marks</h6>

    <table style="border:1px solid black;">
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
    <a href="makePdf.php">Generate PDF Now</a>
  </div>

  </div>

</body>

</html>