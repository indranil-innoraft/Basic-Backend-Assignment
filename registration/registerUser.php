<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once ('../vendor/autoload.php');

require_once ('../database/connection.php');

session_start();

//Creating Validation class object for validation.
$validate = new Validation();

//Creating UserInfo class object for storing user data.
$user = new UserInfo();

//Creating validateSubjectMarks object.
$valideateSubjectMarks = new ValidateSubjectMarks();

//Creating the object of Email class.
// $emailFetch = new Email();

session_start();

//Check using checkUserName() method the user name is valid or not.
if (!$validate->checkUserName($_POST['fname'], $_POST['lname'])) {
  $_SESSION['formErrorMsg']=$validate->nameError;
  header('Location: signUp.php');  
} 

//check phone number.
if(!$validate->checkPhoneNumber($_POST['phNum'])){
  $_SESSION['formErrorMsg']=$validate->phoneNumberError;
  header("Location: signUp.php");  
}

// //Using isValidEmail() methods check email id is valid or not.
// if(!$validate->isValidEmail($_POST['email'])) {
//   $_SESSION['formErrorMsg'] = $validate->emailError;
//   header("Location: signUp.php");  
// }

if(!$validate->isValidPassword($_POST['password'])){
  $_SESSION['formErrorMsg'] = $validate->passwordError;
  header("Location: signUp.php");
}

if(!$connection->isExists($_POST['email'])) {
  $connection->pushIntoDataBase($_POST['fname'], $_POST['lname'], $_POST['phNum'], $_POST['email'], $_POST['password']);
  $_SESSION['formErrorMsg']="Account Create Successfully.Please Login Now";
  header("Location: ../index.php");
}
else {
  $_SESSION['formErrorMsg']="Account already exits.";
  header('Location: signUp.php');
}

?>
