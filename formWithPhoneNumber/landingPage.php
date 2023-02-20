<?php
//Starting the session for using $_SESSION builtin variable.
session_start();

//Check user is login or not.
if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }

//Provids the UserInfo class.
include('../userInformation.php');

//Provides the ValidateSubjectMarks class.
require('../checkSubjectMarks.php');

//Provides the Validation class.
require('../validation.php');

// $firstName, $lastName, $textArea, $phoneNo getting values form the 
//$_POST builtin variable.
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$textArea = $_POST['textArea'];
$phoneNo = $_POST['phNum'];

//$fileName, $filePath, $type, $tempName, $size getting values
//from $_POST built in variable.
$fileName = $_FILES['image']['name'];
$filePath = $_FILES['image']['full_path'];
$type = $_FILES['image']['type'];
$tempName = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];

//Using checkPhoneNumber() method checking user inputs a valid phone number or not.
if($validate->checkPhoneNumber($phoneNo) === true){
  //Set the user phone number using setPhoneNumber() method.
  $user->setPhoneNumber($_SESSION['phone']);
}
else{
  header("Location:formWithPhoneNumber.php");
}

//check user uploded photo is valid or not.
if ($validate->checkUploadedFile($fileName, $tempName, $filePath, $type, $size) === false) {
  //if invalid entry user need to redirect to the form page.
  header('Location: formWithPhoneNumber.php');
} else {
  $path = "../formWithImage/upload_image/" . $fileName;
  $_SESSION['uploadedImage'] = $path;
  //If user upload a valid image then send the image into upload_image folder.
  move_uploaded_file($tempName, $path);
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
  header('Location: formWithPhoneNumber.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-4 Output</title>
  <link rel="stylesheet" href="../outputScreenStyle.css">

</head>

<body>
  <div class="info">
  <h1>Hello
    <?php

    //Printing the user first and last name together using getFirstName() and getLastName() methods.
    echo $user->getFirstName() . " " . $user->getLastName();
    ?>
  </h1>

  <?php
  //Printing the phone number using getPhoneNumber() method.
  echo "<p>Phone no :" . $user->getPhoneNumber() . "</p>";
  ?>

  <!-- Display the uploaded image on the screen. -->
  <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />

  <div class="file-name">
    <?php

    //Creating object of ValidateSubjectMarks class.
    $valideateSubjectMarks = new ValidateSubjectMarks();

    //Check using validateUserInput() method if user inputs a valid subject and marks or not.
    if($valideateSubjectMarks->validateUserInput($textArea) === false){
      header('Location: formWithPhoneNumber.php');
    }
    ?>

  <h6>Subject With Marks</h6>
    <table>
      <tr>
        <!-- Return the subjects name. -->
        <?php $valideateSubjectMarks->getSubject(); ?>
      </tr>

      <tr>
        <!-- Return the marks. -->
        <?php $valideateSubjectMarks->getMark(); ?>
      </tr>
    </table>
    </div>

  </div>

</body>

</html>