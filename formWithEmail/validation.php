<?php
//Start the for using $_SESSION builtin variable.
session_start();

require ('../vendor/autoload.php');

//Creating Validation class object for validation.
$validate = new Validation();

//Creating UserInfo class object for storing user data.
$user = new UserInfo();

//creating ValidateSubjectMarks class object.
$valideateSubjectMarks = new ValidateSubjectMarks();

//Creating the object of Email class.
$emailFetch = new Email();


//user name check.
if ($validate->checkUserName($_POST['fname'], $_POST['lname'])) {
  //set the session variable.
  $_SESSION['firstName'] = $_POST['fname'];
  $_SESSION['lastName'] = $_POST['lname'];
  //set the data to the user object.
  $user->setFirstName($_POST['fname']);
  $user->setLastName($_POST['lname']);
} 
else {
  header('Location: formWithEmail.php');
}

//check user uploded photo is valid or not.
if ($validate->checkUploadedFile($_FILES['image']['name'], $_FILES['image']['tmp_name'], $_FILES['image']['full_path'], $_FILES['image']['type'], $_FILES['image']['size'])) {
  
  $path = "../formWithImage/upload_image/" . $_FILES['image']['name'];
  $_SESSION['uploadedImage'] = $path;

  //If uploaded image is valid then transfer to upload_image folder.
  move_uploaded_file($_FILES['image']['tmp_name'], $path);
 
} else {
   //if invalid entry user need to redirect to the form page.
   header('Location: formWithEmail.php');
}

//Using validateUserInput() method for checking input marks is valid or not.
if(!$valideateSubjectMarks->validateUserInput($_POST['textArea'])){
  header('Location: formWithEmail.php');
}

//checkPhoneNumber() method for checking phone number is valid or not.
if($validate->checkPhoneNumber($_POST['phNum'])){
  $user->setPhoneNumber($_POST['phNum']);
}
else{
  header("Location:formWithEmail.php");
}

//validateEmail() method checking user inputs a valid email or not.
if ($emailFetch->validateEmail( $_POST['email'])) {
  $_SESSION['email'] =  $_POST['email'];
  $user->setEmailId( $_POST['email']);
} 
else {
  $_SESSION['formErrorMsg'] = "email is not valid.";
  header("Location:formWithEmail.php");
}

?>