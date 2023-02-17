<?php
session_start();

if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }

//include userInfo class.
include('../userInformation.php');
require('../checkSubjectMarks.php');
require('../validation.php');
require('../email.php');

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$textArea = $_POST['textArea'];
$phoneNo = $_POST['phNum'];

$email = $_POST['email'];

$emailFetch = new Email();

if ($emailFetch->validateEmail($email) === true) {
  $_SESSION['email'] = $email;
  $user->setEmailId($email);
} else {
  $_SESSION['formErrorMsg'] = "email is not valid.";
  header("Location:formWithEmail.php");
}

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
  move_uploaded_file($tempName, $path);
}

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
      echo $user->getFirstName() . " " . $user->getlastName();
      ?>
    </h1>
    <?php
    echo "<p>Phone no :" . $user->getPhoneNumber() . "</p>";
    echo "<p>Email id :" . $user->getEmailId() . "</p>";
    ?>
    <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />

    <?php
    $valideateSubjectMarks = new ValidateSubjectMarks();
    $valideateSubjectMarks->validateUserInput($textArea);
    ?>
    <h6>Subject With Marks</h6>

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

</body>

</html>