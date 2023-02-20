<?php
//Starting the session.
session_start();

//Provides User information.
require('../userInformation.php');

//Provides subject and Marks class.
require('../checkSubjectMarks.php');

//Provides validation class for validate user inputs.
require('../validation.php');

//Provides email class for checking user email is valid or not.
require('../email.php');

//Getting $firstName, $lastName, $textArea, $phoneNo, $email
//from inbuilt variable $_POST.
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$textArea = $_POST['textArea'];
$phoneNo = $_POST['phNum'];
$email = $_POST['email'];

//Getting $fileName, $filePath, $type, $tempName, $size
//from inbuilt variable $_FILES
$fileName = $_FILES['image']['name'];
$filePath = $_FILES['image']['full_path'];
$type = $_FILES['image']['type'];
$tempName = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];

//Creating validateSubjectMarks object.
$valideateSubjectMarks = new ValidateSubjectMarks();

//Check subject and marks of the user is valid or not
//using validateUserInput() method.
if ($valideateSubjectMarks->validateUserInput($textArea) === false) {
  header('Location: compleForm.php');
}

//Creating object of email class.
$emailFetch = new Email();

//Using validateEmail() method for checking user enter a valid email-id or not.
if ($emailFetch->validateEmail($email) === true) {
  $_SESSION['email'] = $email;
  //Set the email-id for the user.
  $user->setEmailId($email);
} else {
  $_SESSION['formErrorMsg'] = "email is not valid.";
  header("Location: compleForm.php");
}

//Check using checkUserName() method the user name is valid or not.
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

//check user uploded photo is valid or not using checkUploadedFile() method.
if ($validate->checkUploadedFile($fileName, $tempName, $filePath, $type, $size) === false) {
  //if invalid entry user need to redirect to the form page.
  header('Location: compleForm.php');
} else {
  $path = "../formWithImage/upload_image/" . $fileName;
  $_SESSION['uploadedImage'] = $path;
  //if the uploaded image is valid then send it to the upload_image folder.
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
      //Display the full name of the user.
      echo $user->getFirstName() . " " . $user->getLastName();
      ?>
    </h1>
    <?php
    //Display the phone number useing getPhoneNumber() method.
    echo "<p>Phone no : " . $user->getPhoneNumber() . "</p>";

    //Display the phone number useing getEmailId() method.
    echo "<p>Email id : " . $user->getEmailId() . "</p>";
    ?>

    <!-- Display the uploaded image of the user. -->
    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />

    <h6>Subject With Marks</h6>
    
    <!-- Show the table of the subject and marks. -->
    <table>
      <tr>
        <!-- iterate over the subject array. -->
        <?php $valideateSubjectMarks->getSubject(); ?>
      </tr>

      <tr>
        <!-- iterate over the marks array. -->
        <?php $valideateSubjectMarks->getMark(); ?>
      </tr>
    </table>
    <!-- Download as pdf button. -->
    <a href="makePdf.php">Generate PDF Now</a>
  </div>

  </div>

</body>

</html>