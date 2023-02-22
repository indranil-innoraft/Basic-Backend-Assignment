<?php
//Starting the session using $_SESSION builtin variable.
session_start();

//Check User login or not.
if (!isset($_SESSION['login'])) {
  header('location: ../index.php');
}

require ('../vendor/autoload.php');

//Creating Validation class object for validation.
$validate = new Validation();

//Creating UserInfo class object for storing user data.
$user = new UserInfo();

// check user enter a propper name or not.
if ($validate->checkUserName($_POST['fname'], $_POST['lname'])) {
  $_SESSION['firstName'] = $_POST['fname'];
  $_SESSION['lastName'] = $_POST['lname'];
  
  //set the data to the user object.
  $user->setFirstName($_POST['fname']);
  $user->setLastName($_POST['lname']);
} 
else {
  $_SESSION['formErrorMsg']=$validate->nameError;
  header('Location: form.php');
}

?>