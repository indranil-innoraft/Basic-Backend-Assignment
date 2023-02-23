<?php
//Starting the session.
session_start();

require ('../vendor/autoload.php');

//Creating Validation class object for validation.
$validate = new Validation();

//Creating UserInfo class object for storing user data.
$user = new UserInfo();

//Creating validateSubjectMarks object.
$valideateSubjectMarks = new ValidateSubjectMarks();

//Creating the object of Email class.
// $emailFetch = new Email();

//Check using checkUserName() method the user name is valid or not.
if ($validate->checkUserName($_POST['fname'], $_POST['lname'])) {
  //set the session variable.
  $_SESSION['firstName'] = $_POST['fname'];
  $_SESSION['lastName'] = $_POST['lname'];
  //set the data to the user object.
  $user->setFirstName($_POST['fname']);
  $user->setLastName($_POST['lname']);
} 
else {
  $_SESSION['formErrorMsg']=$validate->nameError;
  header('Location: compleForm.php');
}

//check user uploded photo is valid or not using checkUploadedFile() method.
if ($validate->checkUploadedFile($_FILES['image']['name'], $_FILES['image']['tmp_name'], $_FILES['image']['full_path'], $_FILES['image']['type'], $_FILES['image']['size'])) {
  $path = "../formWithImage/upload_image/" . $_FILES['image']['name'];
  $_SESSION['uploadedImage'] = $path;
  //if the uploaded image is valid then send it to the upload_image folder.
  move_uploaded_file($_FILES['image']['tmp_name'], $path);
}
 else {
  $_SESSION['formErrorMsg']=$validate->uploadedFileError;
  //if invalid entry user need to redirect to the form page.
  header('Location: compleForm.php');
}

//Check subject and marks of the user is valid or not using validateUserInput() method.
if (!$valideateSubjectMarks->validateUserInput($_POST['textArea'])) {
  $_SESSION['formErrorMsg']=$valideateSubjectMarks->subjectAndMarksError;
  header('Location: compleForm.php');
}
else {
  $_SESSION['subjects'] = implode(" ", $valideateSubjectMarks->subjects);
  $_SESSION['marks'] = implode(" ", $valideateSubjectMarks->marks);
}

//check phone number.
if($validate->checkPhoneNumber($_POST['phNum'])){
  $_SESSION['phone']=$_POST['phNum'];
  $user->setPhoneNumber($_POST['phNum']);
}
else{
  $_SESSION['formErrorMsg']=$validate->phoneNumberError;
  header("Location:compleForm.php");
}

// //Using validateEmail() method for checking user enter a valid email-id or not.
// if ($emailFetch->validateEmail($_POST['email'])) {
//   $_SESSION['email'] = $_POST['email'];
//   //Set the email-id for the user.
//   $user->setEmailId($_POST['email']);
// } 
// else {
//   $_SESSION['formErrorMsg'] = "email is not valid.";
//   header("Location: compleForm.php");

// }

//Using isValidEmail() methods check email id is valid or not.
if($validate->isValidEmail($_POST['email'])) {
  $_SESSION['email'] =  $_POST['email']; 
  $user->setEmailId( $_POST['email']);
}
else {
  $_SESSION['formErrorMsg'] = $validate->emailError;
  header("Location:compleForm.php");
}

?>
