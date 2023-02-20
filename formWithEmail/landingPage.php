<?php
//Start the for using $_SESSION builtin variable.
session_start();

//Checking user is login or not.
if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }

//Include userInfo class.
include('../userInformation.php');

//Provides the ValidateSubjectMarks class.
require('../checkSubjectMarks.php');

//Provides the Validataion class.
require('../validation.php');

//Provdes the Email class.
require('../email.php');

//$firstName, $lastName, $textArea, $phoneNo, $email getting values from the 
//$_POST builtin variable.
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$textArea = $_POST['textArea'];
$phoneNo = $_POST['phNum'];
$email = $_POST['email'];

//Creating the object of Email class.
$emailFetch = new Email();

//validateEmail() method checking user inputs a valid email or not.
if ($emailFetch->validateEmail($email) === true) {
  $_SESSION['email'] = $email;
  $user->setEmailId($email);
} else {
  $_SESSION['formErrorMsg'] = "email is not valid.";
  header("Location:formWithEmail.php");
}

//$fileName, $filePath, $type, $tempName, $size getting values from the 
//$_POST bulitin variable.
$fileName = $_FILES['image']['name'];
$filePath = $_FILES['image']['full_path'];
$type = $_FILES['image']['type'];
$tempName = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];

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
  header('Location: formWithEmail.php');
}


//check user uploded photo is valid or not.
if ($validate->checkUploadedFile($fileName, $tempName, $filePath, $type, $size) === false) {
  //if invalid entry user need to redirect to the form page.
  header('Location: formWithEmail.php');
} else {
  $path = "../formWithImage/upload_image/" . $fileName;
  $_SESSION['uploadedImage'] = $path;
  //If uploaded image is valid then transfer to upload_image folder.
  move_uploaded_file($tempName, $path);
}

//checkPhoneNumber() method for checking phone number is valid or not.
if($validate->checkPhoneNumber($phoneNo) === true){
  $user->setPhoneNumber($_SESSION['phone']);
}
else{
  header("Location:formWithEmail.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment-5 Output</title>
  <link rel="stylesheet" href="../outputScreenStyle.css">

</head>

<body>
  <div class="info">
    <h1>Hello
      <?php
      //Using getFirstName() and getLastName() method printing the full name of the user. 
      echo $user->getFirstName() . " " . $user->getLastName();
      ?>
    </h1>
    <?php

    //Printing the phone number and email id of the user.
    echo "<p>Phone no :" . $user->getPhoneNumber() . "</p>";
    echo "<p>Email id :" . $user->getEmailId() . "</p>";
    ?>

    <!-- Display the image on the screen. -->
    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />

    <?php

    //creating ValidateSubjectMarks class object.
    $valideateSubjectMarks = new ValidateSubjectMarks();

    //Using validateUserInput() method check user inputs valid subject and marks or not.
    $valideateSubjectMarks->validateUserInput($textArea);
    ?>
    <h6>Subject With Marks</h6>

    <table>
      <tr>
        <!-- Return the subject name. -->
        <?php $valideateSubjectMarks->getSubject(); ?>
      </tr>

      <tr>
        <!-- Return the marks. -->
        <?php $valideateSubjectMarks->getMark(); ?>
      </tr>
    </table>

  </div>

</body>

</html>