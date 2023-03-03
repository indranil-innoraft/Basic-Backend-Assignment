<?php

require_once ('../vendor/autoload.php');
require ('../validation.php');
require_once ('../database/connection.php');

session_start();

//Creating Validation class object for validation.
$validate = new Validation();

//Creating the object of Email class.
// $emailFetch = new Email();

session_start();

// Using isValidEmail() methods check email id is valid or not.
// if(!$validate->isValidEmail($_POST['email'])) {
//   $_SESSION['formErrorMsg'] = $validate->emailError;
//   header("Location: signUp.php");  
// }

if(!$validate->isValidPassword($_POST['password'])) {
  $_SESSION['formErrorMsg'] = $validate->passwordError;
  header('Location: signUp.php');
}
else {
  if(!$connection->isExists($_POST['email'])) {
    $connection->pushIntoDataBase($_POST['email'], md5($_POST['password']));
    $_SESSION['formErrorMsg']="Account Create Successfully.Please Login Now";
    header("Location: ../index.php");
  }
  else {
    $_SESSION['formErrorMsg'] = "Account already exits.";
    header('Location: signUp.php');
  }
}

?>
